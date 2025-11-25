<?php
include_once("../dboperation.php");
$obj = new dboperation();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $booking_id = $_POST['booking_id'];
  $new_status = $_POST['new_status']; // "Confirmed" or "Rejected"

  $sql="SELECT * FROM tbl_booking WHERE booking_id='$booking_id'";
  $res=$obj->executeQuery($sql);
  $display=mysqli_fetch_array($res);
  $a=$display['customerid'];

  $sql2="SELECT * FROM tbl_custreg WHERE customerid='$a'";
  $res2=$obj->executeQuery($sql2);
  $display2=mysqli_fetch_array($res2);
  $name=$display2['customername'];
  $email=$display2['email'];

  // Sanitize input (optional but recommended)
  $booking_id = intval($booking_id);
  $new_status = ($new_status === 'Confirmed') ? 'Confirmed' : 'Rejected';

  $query = "UPDATE tbl_booking SET status='$new_status' WHERE booking_id='$booking_id'";
   $result = $obj->executeQuery($query); 
   if($result){
   $bodyContent = "Dear $name, Your booking status has been updated to $new_status.";
        $mailtoaddress = $email;
        require('phpmailer.php');
        echo "<script>alert('Status updated and email sent successfully.');</script>";
   } else {
       echo "<script>alert('Failed to update status. Please try again.');</script>";
   }
 
}
?>
