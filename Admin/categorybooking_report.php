<?php
include('Header.php');
include('../dboperation.php');
$obj = new dboperation();

$sql = "SELECT c.Categoryname, COUNT(b.booking_id) as total_bookings
        FROM tbl_booking b
        JOIN tbl_card cr ON b.cardid = cr.cardid
        JOIN tbl_category c ON cr.category_id = c.category_id
        GROUP BY c.category_id";

$res = $obj->executequery($sql);

$categories = [];
$totals = [];

while($row = mysqli_fetch_assoc($res)) {
    $categories[] = $row['Categoryname'];
    $totals[] = $row['total_bookings'];
}
?>

<div class="container mt-5" style="max-width:600px;">
    <h4 class="mb-4 text-center">Category-wise Booking Count</h4>
    <canvas id="categoryBookingChart" width="400" height="300"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('categoryBookingChart').getContext('2d');
const categoryBookingChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: <?php echo json_encode($categories); ?>,
        datasets: [{
            label: 'Number of Bookings',
            data: <?php echo json_encode($totals); ?>,
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
