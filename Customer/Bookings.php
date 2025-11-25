<?php
session_start();

include 'header.php';
include_once("../dboperation.php");


if (!isset($_SESSION['customerid'])) {
    header("Location: Login.php"); 
    exit();
}

$obj = new dboperation();
$customerid = $_SESSION['customerid'];

$sql = "SELECT b.*, c.cardname, c.designprice 
        FROM tbl_booking b 
        JOIN tbl_card c ON b.cardid = c.cardid 
        WHERE b.customerid = '$customerid'
        ORDER BY b.bookingdate DESC";
$res = $obj->executequery($sql);
$i=1;
?>

<div id="fh5co-services" class="fh5co-section-gray" style="padding-top:50px; padding-bottom:50px;">
    <div class="container">

        <!-- Heading -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading"><br></br><br></br>
                <h2>My Bookings</h2>
            </div>
        </div>

        <!-- Table -->
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Card Name</th>
                            <th>Booking Date</th>
                            <th>Required Date</th>
                            <th>No. of Copies</th>
                            <th>Amount</th>
                            <th>Content</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(mysqli_num_rows($res) > 0) { 
                            while($row = mysqli_fetch_array($res)) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['cardname']; ?></td>
                                    <td><?php echo $row['bookingdate']; ?></td>
                                    <td><?php echo $row['requireddate']; ?></td>
                                    <td><?php echo $row['no_copies']; ?></td>
                                    <td>₹<?php echo $row['amount']; ?></td>
                                    <td><?php echo $row['content']; ?></td>
                                    <td>
                                   <?php
                                   echo $row['status'];

                                 if ($row['status'] == 'Confirmed') {
                                 ?>
                              <a href="makepayment.php?booking_id=<?php echo $row["booking_id"];?>&amount=<?php echo $row["amount"];?>&type=booking" class="btn btn-success btn-sm" style="margin-top:5px;">Pay Now</a>
                              <?php
                            } elseif ($row['status'] == 'Paid') {
                            echo "<br><span class='badge badge-success'>Paid</span>";
                          }
                         ?>

                         </td>

                                </tr>
                        <?php } } else { ?>
                            <tr>
                                <td colspan="8" class="text-center">No bookings found.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php';
?>