<?php
session_start();
include_once("../dboperation.php");
$obj = new dboperation();

$category_id   = $_POST['category_id'];
$quantity      = $_POST['quantity'];
$content       = $_POST['content'];
$required_date = $_POST['required_date'];
$remark        = $_POST['remark'];
$customerid    = $_SESSION['customerid'];

$sample_design = $_FILES['sample_design']['name'];
$target_path = "../Uploads/" . basename($sample_design);
move_uploaded_file($_FILES['sample_design']['tmp_name'], $target_path);

$booking_date = date('Y-m-d'); 
$status = "Pending";


$sql = "INSERT INTO tblcustomization 
        (category_id, quantity, content, sample_design, booking_date, required_date, remark, status, customerid) 
        VALUES 
        ('$category_id', '$quantity', '$content', '$sample_design', '$booking_date', '$required_date', '$remark', '$status','$customerid')";

$res = $obj->executequery($sql);

if ($res) {
    echo "<script>alert('Customization booking successful!'); window.location='custindex.php';</script>";
} else {
    echo "<script>alert('Booking failed, please try again.'); window.history.back();</script>";
}
?>
