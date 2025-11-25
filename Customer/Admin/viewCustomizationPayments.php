<?php
session_start();
include 'Header.php';
include_once("../dboperation.php");

// Check if admin is logged in
if (!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit();
}

$obj = new dboperation();

// Fetch customization payments with customer and category details
$sql = "SELECT p.*, c.customization_id, c.quantity, c.content, c.required_date,
        cat.Categoryname, cr.customername, cr.contactno
        FROM tbl_payment p
        INNER JOIN tblcustomization c ON p.customization_id = c.customization_id
        INNER JOIN tbl_category cat ON c.category_id = cat.category_id
        INNER JOIN tbl_custreg cr ON c.customerid = cr.customerid
        WHERE p.type = 'customization'
        ORDER BY p.date DESC";

$res = $obj->executequery($sql);
?>

<div class="container" style="padding-top:50px; padding-bottom:50px;">
    <div class="row">
        <div class="col-md-12">
            <h2>Customization Payments</h2>
            <hr>
            
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Payment ID</th>
                        <th>Date</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Category</th>
                        <th>Quantity</th>
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
                                <td><?php echo $row['Categoryname']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td>₹<?php echo number_format($row['total_amount'], 2); ?></td>
                                <td><span class="badge badge-success"><?php echo $row['status']; ?></span></td>
                                <td>
                                    <a href="viewpaymentdetails.php?payment_id=<?php echo $row['payment_id']; ?>&type=customization" 
                                       class="btn btn-info btn-sm">View Details</a>
                                </td>
                            </tr>
                    <?php } } else { ?>
                        <tr>
                            <td colspan="9" class="text-center">No customization payments found.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'Footer.php'; ?>
