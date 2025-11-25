<?php
include('Header.php');
include('../dboperation.php');
$obj = new dboperation();

// Fetch number of bookings per card
$sql = "SELECT cr.cardname, COUNT(b.booking_id) AS total_bookings
        FROM tbl_booking b
        JOIN tbl_card cr ON b.cardid = cr.cardid
        GROUP BY cr.cardid
        ORDER BY cr.cardname";

$res = $obj->executequery($sql);

$cards = [];
$totals = [];

while($row = mysqli_fetch_assoc($res)) {
    $cards[] = $row['cardname'];       // Card names
    $totals[] = $row['total_bookings']; // Booking count
}
?>

<div class="container mt-5" style="max-width:800px;">
    <h4 class="mb-4 text-center">Card-wise Booking Report</h4>
    <canvas id="cardBookingChart" width="700" height="400"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('cardBookingChart').getContext('2d');
const cardBookingChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($cards); ?>,
        datasets: [{
            label: 'Number of Bookings',
            data: <?php echo json_encode($totals); ?>,
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
</script>

<?php include('Footer.php'); ?>
