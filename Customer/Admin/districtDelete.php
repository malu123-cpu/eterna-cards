<?php
include("../dboperation.php");
$obj = new dboperation();

if (isset($_GET["districtid"])) {
    $districtId = $_GET["districtid"];

    $sql = "SELECT * FROM tbl_district WHERE districtid = $districtId";
    $res = $obj->executequery($sql);
    $record = mysqli_fetch_array($res);

    
    $imageFile = "../Uploads/" . $record["districtImage"];
    if (file_exists($imageFile)) {
        unlink($imageFile);
    }
    

    // Delete the record from the database
    $sql = "DELETE FROM tbl_district WHERE districtid = $districtId";
    $res = $obj->executequery($sql);

    if ($res) {
        echo "<script>alert('District deleted successfully!'); window.location='districtView.php';</script>";
    } else {
        echo "<script>alert('Failed to delete district.'); window.location='districtView.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location='districtView.php';</script>";
}
?>
