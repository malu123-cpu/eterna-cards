<?php
include('Header.php');
include('../dboperation.php');
$obj = new dboperation();

$sql_card = "SELECT cr.cardname, COUNT(b.booking_id) AS total_bookings
        FROM tbl_booking b
        JOIN tbl_card cr ON b.cardid = cr.cardid
        GROUP BY cr.cardid
        ORDER BY cr.cardname";
$res_card = $obj->executequery($sql_card);
$cards = [];
$card_totals = [];
while($row = mysqli_fetch_assoc($res_card)) {
    $cards[] = $row['cardname'];
    $card_totals[] = $row['total_bookings'];
}

$sql_category = "SELECT c.Categoryname, COUNT(b.booking_id) as total_bookings
        FROM tbl_booking b
        JOIN tbl_card cr ON b.cardid = cr.cardid
        JOIN tbl_category c ON cr.category_id = c.category_id
        GROUP BY c.category_id";
$res_category = $obj->executequery($sql_category);
$categories = [];
$category_totals = [];
while($row = mysqli_fetch_assoc($res_category)) {
    $categories[] = $row['Categoryname'];
    $category_totals[] = $row['total_bookings'];
}

$sql_recent_payments = "SELECT p.payment_id, b.booking_id, c.cardname, cu.customername, p.total_amount, p.date, p.status 
        FROM tbl_payment p
        INNER JOIN tbl_booking b ON p.booking_id = b.booking_id
        INNER JOIN tbl_card c ON b.cardid = c.cardid  
        INNER JOIN tbl_custreg cu ON b.customerid = cu.customerid
        ORDER BY p.date DESC LIMIT 5";
$res_recent_payments = $obj->executequery($sql_recent_payments);
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3">
      <div class="card overflow-hidden">
        <div class="card-body p-4">
          <h5 class="card-title mb-4">Total Bookings</h5>
          <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
              <i class="ti ti-shopping-cart fs-7 text-primary"></i>
            </div>
            <div class="flex-grow-1 ms-3">
              <?php
              $sql_total_bookings = "SELECT COUNT(*) as total FROM tbl_booking";
              $res_total = $obj->executequery($sql_total_bookings);
              $total_bookings = mysqli_fetch_assoc($res_total)['total'];
              ?>
              <h4 class="mb-0"><?php echo $total_bookings; ?></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card overflow-hidden">
        <div class="card-body p-4">
          <h5 class="card-title mb-4">Total Revenue</h5>
          <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
              <i class="ti ti-currency-rupee fs-7 text-success"></i>
            </div>
            <div class="flex-grow-1 ms-3">
              <?php
             $sql_total_revenue = "SELECT SUM(total_amount) as total FROM tbl_payment WHERE status = 'paid'";
$res_revenue = $obj->executequery($sql_total_revenue);
$total_revenue = mysqli_fetch_assoc($res_revenue)['total'] ?? 0;
?>
              <h4 class="mb-0">₹<?php echo number_format($total_revenue, 2); ?></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card overflow-hidden">
        <div class="card-body p-4">
          <h5 class="card-title mb-4">Total Customers</h5>
          <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
              <i class="ti ti-users fs-7 text-info"></i>
            </div>
            <div class="flex-grow-1 ms-3">
              <?php
              $sql_total_customers = "SELECT COUNT(*) as total FROM tbl_custreg";
              $res_customers = $obj->executequery($sql_total_customers);
              $total_customers = mysqli_fetch_assoc($res_customers)['total'];
              ?>
              <h4 class="mb-0"><?php echo $total_customers; ?></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card overflow-hidden">
        <div class="card-body p-4">
          <h5 class="card-title mb-4">Pending Payments</h5>
          <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
              <i class="ti ti-clock fs-7 text-warning"></i>
            </div>
            <div class="flex-grow-1 ms-3">
              <?php
              $sql_pending = "SELECT COUNT(*) as total FROM tbl_booking WHERE status = 'confirmed'";
              $res_pending = $obj->executequery($sql_pending);
              $pending_payments = mysqli_fetch_assoc($res_pending)['total'];
              ?>
              <h4 class="mb-0"><?php echo $pending_payments; ?></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-lg-6">
      <div class="card w-100">
        <div class="card-body">
          <h4 class="card-title">Card-wise Bookings</h4>
          <canvas id="cardBookingChart" height="250"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card w-100">
        <div class="card-body">
          <h4 class="card-title">Category-wise Bookings</h4>
          <canvas id="categoryBookingChart" height="250"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4">Recent Payments</h4>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead class="table-dark">
                <tr>
                  <th>Booking ID</th>
                  <th>Card Name</th>
                  <th>Customer Name</th>
                  <th>Amount</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (mysqli_num_rows($res_recent_payments) > 0) {
                  while ($row = mysqli_fetch_assoc($res_recent_payments)) {
                    $status_class = '';
                    if ($row['status'] == 'completed') $status_class = 'bg-success-subtle text-success';
                    elseif ($row['status'] == 'pending') $status_class = 'bg-warning-subtle text-warning';
                    else $status_class = 'bg-danger-subtle text-danger';
                    
                    echo "<tr>
                            <td>{$row['booking_id']}</td>
                            <td>{$row['cardname']}</td>
                            <td>{$row['customername']}</td>
                            <td>₹{$row['total_amount']}</td>
                            <td>{$row['date']}</td>
                            <td><span class='badge {$status_class}'>{$row['status']}</span></td>
                          </tr>";
                  }
                } else {
                  echo "<tr><td colspan='6' class='text-center'>No recent payments found</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  const cardCtx = document.getElementById('cardBookingChart').getContext('2d');
  const cardBookingChart = new Chart(cardCtx, {
      type: 'bar',
      data: {
          labels: <?php echo json_encode($cards); ?>,
          datasets: [{
              label: 'Number of Bookings',
              data: <?php echo json_encode($card_totals); ?>,
              backgroundColor: '#36A2EB',
              borderColor: '#1E70B8',
              borderWidth: 1
          }]
      },
      options: {
          responsive: true,
          scales: {
              y: {
                  beginAtZero: true,
                  title: {
                      display: true,
                      text: 'Number of Bookings'
                  }
              },
              x: {
                  title: {
                      display: true,
                      text: 'Card Name'
                  }
              }
          },
          plugins: {
              legend: {
                  display: false
              }
          }
      }
  });

  const categoryCtx = document.getElementById('categoryBookingChart').getContext('2d');
  const categoryBookingChart = new Chart(categoryCtx, {
      type: 'pie',
      data: {
          labels: <?php echo json_encode($categories); ?>,
          datasets: [{
              label: 'Number of Bookings',
              data: <?php echo json_encode($category_totals); ?>,
              backgroundColor: [
                  '#FF6384', '#36A2EB', '#FFCE56', '#8AFF33', '#FF33F6', '#33FFF2', '#FF8F33'
              ],
              borderWidth: 1
          }]
      },
      options: {
          responsive: true,
          plugins: {
              legend: {
                  position: 'bottom',
              }
          }
      }
  });
</script>

<?php include('Footer.php'); ?>
