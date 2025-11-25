<?php
session_start();
include_once("../dboperation.php");
$obj = new dboperation();
if (!isset($_SESSION['customerid'])){$_SESSION['customerid']  = session_id();
}
$customerid = $_SESSION['customerid'];

$cardid        = $_POST['cardid'];
$requireddate  = $_POST['requireddate'];
$no_copies     = $_POST['no_copies'];
$content       = $_POST['content'];
$review        = $_POST['review'];

$sql_price = "SELECT designprice FROM tbl_card WHERE cardid='$cardid'";
$res_price = $obj->executequery($sql_price);
$row = mysqli_fetch_assoc($res_price);

if (!$row) {
    echo "<script>alert('Invalid card selected!');window.history.back();</script>";
    exit();
}
$designprice = $row['designprice'];

$amount = $designprice * $no_copies;

$status = "Pending";

$sql = "INSERT INTO tbl_booking
        (cardid, customerid, bookingdate,type, requireddate, no_copies, amount, content, review, status) 
        VALUES
        ('$cardid','$customerid',now(),'booking','$requireddate','$no_copies','$amount','$content','$review','$status')";

$res = $obj->executequery($sql);

if ($res) {
    echo "<script>alert('Booking successful!'); window.location='custindex.php'</script>";
} else {
    echo "<script>alert('Booking failed, please try again.');</script>";
}
?>
