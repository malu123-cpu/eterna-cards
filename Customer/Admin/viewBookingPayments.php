<?php
session_start();
include 'Header.php';
include_once("../dboperation.php");



if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}

$obj = new dboperation();

$sql = "SELECT p.*, b.booking_id, b.bookingdate, b.requireddate, b.no_copies, b.content,
        c.cardname, cr.customername, cr.contactno
        FROM tbl_payment p
        INNER JOIN tbl_booking b ON p.booking_id = b.booking_id
        INNER JOIN tbl_card c ON b.cardid = c.cardid
        INNER JOIN tbl_custreg cr ON b.customerid = cr.customerid
        WHERE p.type = 'booking'
        ORDER BY p.date DESC";
$res = $obj->executequery($sql);
?>

<div class="container" style="padding-top:50px; padding-bottom:50px;">
    <div class="row">
        <div class="col-md-12">
            <h2>Booking Payments</h2>
            <hr>
            
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Payment ID</th>
                        <th>Date</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Card Name</th>
                        <th>Copies</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(mysqli_num_rows($res) > 0) { 
                        while($row = mysqli_fetch_array($res)) { ?>
                            <tr>
                                <td><?php echo $row['payment_id']; ?></td>
                                <td><?php echo date('d-M-Y', strtotime($row['date'])); ?></td>
                                <td><?php echo $row['customername']; ?></td>
                                <td><?php echo $row['contactno']; ?></td>
                                <td><?php echo $row['cardname']; ?></td>
                                <td><?php echo $row['no_copies']; ?></td>
                                <td>₹<?php echo number_format($row['total_amount'], 2); ?></td>
                                <td><span class="badge badge-success"><?php echo $row['status']; ?></span></td>
                                <td>
                                    <a href="viewpaymentdetails.php?payment_id=<?php echo $row['payment_id']; ?>&type=booking" 
                                       class="btn btn-info btn-sm">View Details</a>
                                </td>
                            </tr>
                    <?php } } else { ?>
                        <tr>
                            <td colspan="9" class="text-center">No booking payments found.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'Footer.php'; ?>