<?php
include_once("../dboperation.php");
$obj=new dboperation();
if (isset($_POST["Submit"]))
{
    $id=$_POST['locationid'];
    $locationname=$_POST['locationname'];
    
    $sql = "UPDATE tbl_location SET locationname = '$locationname' WHERE locationid = $id";
    $result = $obj->executequery($sql);
    if ($result == 1){
        echo "<script>alert('Edited Successfully!!');window.location='location_view.php'</script>";
    } else {
        echo "<script>alert('Invalid request!');window.location='location_view.php'</script>";
    }
}
?>
