<?php
include("../dboperation.php");
$obj = new dboperation();

if (isset($_GET["locationid"])) {
    $locid = (int)$_GET["locationid"]; // sanitize input

    $sql = "DELETE FROM tbl_location WHERE locationid = $locid";
    $res = $obj->executequery($sql);

    if ($res) {
        echo "<script>alert('Deleted Successfully!!');window.location='location_view.php'</script>";
    } else {
        echo "<script>alert('Deletion failed.');window.location='location_view.php'</script>";
    }
} else {
    echo "<script>alert('Invalid request!');window.location='location_view.php'</script>";
}
?>
