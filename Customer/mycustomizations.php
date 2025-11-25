<?php
session_start();

include 'header.php';
include_once("../dboperation.php");

if (!isset($_SESSION['customerid'])) {
    header("Location: Login.php");
    exit();
}

$obj = new dboperation();

$sql = "SELECT c.*, cat.Categoryname 
        FROM tblcustomization c 
        LEFT JOIN tbl_category cat ON c.category_id = cat.category_id 
        WHERE c.customerid = '".$_SESSION['customerid']."'
        ORDER BY c.booking_date DESC";
$res = $obj->executequery($sql);
?>

<div id="fh5co-services" class="fh5co-section-gray" style="padding-top:50px; padding-bottom:50px;">
    <div class="container">

        <!-- Heading -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading"><br><br><br>
                <h2>My Customizations</h2>
            </div>
        </div>

        <!-- Table -->
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Customization ID</th>
                            <th>Category Name</th>
                            <th>Booking Date</th>
                            <th>Required Date</th>
                            <th>Quantity</th>
                            <th>Rate</th>
                            <th>Total Amount</th>
                            <th>Content</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(mysqli_num_rows($res) > 0) { 
                            while($row = mysqli_fetch_array($res)) { 
                                $total_amount = $row['rate'] * $row['quantity'];
                        ?>
                                <tr>
                                    <td><?php echo $row['customization_id']; ?></td>
                                    <td><?php echo $row['Categoryname']; ?></td>
                                    <td><?php echo $row['booking_date']; ?></td>
                                    <td><?php echo $row['required_date']; ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td>₹<?php echo $row['rate']; ?></td>
                                    <td>₹<?php echo $total_amount; ?></td>
                                    <td><?php echo $row['content']; ?></td>
                                    <td>
                                        <?php
                                        echo $row['status'];
                                        if ($row['status'] == 'Accepted') {
                                            ?>
                                            <a href="makepayment.php?customization_id=<?php echo $row["customization_id"];?>&amount=<?php echo $total_amount;?>&type=customization" class="btn btn-success btn-sm" style="margin-top:5px;">Pay Now</a>
                                            <?php
                                        } elseif ($row['status'] == 'Paid') {
                                            echo "<br><span class='badge badge-success'>Paid</span>";
                                        }
                                        ?>
                                    </td>
                                </tr>
                        <?php 
                            } 
                        } else { 
                        ?>
                            <tr>
                                <td colspan="9" class="text-center">No customizations found.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>