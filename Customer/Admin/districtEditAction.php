<?php
include_once("../dboperation.php");
$obj = new dboperation();

if (isset($_POST["Submit"])) {
    $id = $_POST['districtid'];
    $districtname = $_POST['districtname'];

    // You can add more fields to update if needed, e.g. district description or image

    // Prepare the update SQL query
    $sql = "UPDATE tbl_district SET districtname = '$districtname' WHERE districtid = '$id'";
    $result = $obj->executequery($sql);

    if ($result == 1) {
        echo "<script>alert('Edited Successfully!!'); window.location='districtView.php';</script>";
    } else {
        echo "<script>alert('Failed to edit district.'); window.location='districtView.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location='districtView.php';</script>";
}
?>
