<?php
session_start();
include 'Header.php';
include_once("../dboperation.php");

if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}

$obj = new dboperation();

if (!isset($_GET['payment_id']) || !isset($_GET['type'])) {
    echo "<p>Invalid request. Payment not selected.</p>";
    exit();
}

$payment_id = intval($_GET['payment_id']);
$type = $_GET['type'];

if ($type == 'booking') {
    $query = "SELECT p.payment_id, p.date AS payment_date, p.total_amount, p.status AS payment_status,
                     b.booking_id, b.bookingdate, b.requireddate, b.no_copies, b.content,
                     c.cardname, cr.customername, cr.contactno, cr.email
              FROM tbl_payment p
              INNER JOIN tbl_booking b ON p.booking_id = b.booking_id
              INNER JOIN tbl_card c ON b.cardid = c.cardid
              INNER JOIN tbl_custreg cr ON b.customerid = cr.customerid
              WHERE p.payment_id = '$payment_id'";
} elseif ($type == 'customization') {
    $query = "SELECT p.payment_id, p.date AS payment_date, p.total_amount, p.status AS payment_status,
                     c.customization_id, c.quantity, c.content, c.required_date,
                     cat.Categoryname
              FROM tbl_payment p
              INNER JOIN tblcustomization c ON p.customization_id = c.customization_id
              LEFT JOIN tbl_category cat ON c.category_id = cat.category_id
              WHERE p.payment_id = '$payment_id'";
} else {
    echo "<p>Invalid payment type.</p>";
    exit();
}

$result = $obj->select($query);

if (mysqli_num_rows($result) == 0) {
    echo "<p>No payment found with this ID.</p>";
    exit();
}

$row = mysqli_fetch_assoc($result);
?>

<div class="container" style="padding-top:50px; padding-bottom:50px;">
    <h2 class="text-center mb-4">Payment Details</h2>
    <table class="table table-bordered" style="width:70%; margin:auto;">
        <tr>
            <th>Payment ID</th>
            <td><?php echo $row['payment_id']; ?></td>
        </tr>
        <tr>
            <th>Payment Date</th>
            <td><?php echo date('d-M-Y', strtotime($row['payment_date'])); ?></td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>₹<?php echo number_format($row['total_amount'], 2); ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?php echo $row['payment_status']; ?></td>
        </tr>

        <?php if ($type == 'booking') { ?>
            <tr><th>Customer Name</th><td><?php echo $row['customername']; ?></td></tr>
            <tr><th>Contact</th><td><?php echo $row['contactno']; ?></td></tr>
            <tr><th>Email</th><td><?php echo $row['email']; ?></td></tr>
            <tr><th>Booking ID</th><td><?php echo $row['booking_id']; ?></td></tr>
            <tr><th>Card Name</th><td><?php echo $row['cardname']; ?></td></tr>
            <tr><th>Required Date</th><td><?php echo $row['requireddate']; ?></td></tr>
            <tr><th>No. of Copies</th><td><?php echo $row['no_copies']; ?></td></tr>
            <tr><th>Content</th><td><?php echo $row['content']; ?></td></tr>
        <?php } else { ?>
            <tr><th>Customization ID</th><td><?php echo $row['customization_id']; ?></td></tr>
            <tr><th>Category</th><td><?php echo $row['Categoryname'] ?? 'N/A'; ?></td></tr>
            <tr><th>Required Date</th><td><?php echo $row['required_date']; ?></td></tr>
            <tr><th>Quantity</th><td><?php echo $row['quantity']; ?></td></tr>
            <tr><th>Content</th><td><?php echo $row['content']; ?></td></tr>
        <?php } ?>
    </table>

    <div class="text-center mt-4">
        <a href="<?php echo ($type == 'booking') ? 'viewBookingPayments.php' : 'viewCustomizationPayments.php'; ?>" 
           class="btn btn-primary">Back to Payments</a>
    </div>
</div>

<?php include 'Footer.php'; ?>
