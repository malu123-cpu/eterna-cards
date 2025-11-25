<?php
include_once("../dboperation.php");
$obj=new dboperation();
if (isset($_POST["Submit"]))
{
    $id=$_POST['category_id'];
    $categoryname=$_POST['Categoryname'];
    $categorydescription=$_POST['Description'];
    $image=$_FILES["CategoryImg"]["name"];
    move_uploaded_file($_FILES["CategoryImg"]["tmp_name"], "../Uploads/".$image);
    if($image=='')
    {
    $sql1="UPDATE tbl_category set Categoryname='$categoryname',Description='$categorydescription' where category_id='$id'";
    $result=$obj->executequery($sql1);
    }
    else{
        $sql="UPDATE tbl_category set Categoryname='$categoryname', CategoryImg='$image',Description='$categorydescription' where category_id='$id'";
    $result=$obj->executequery($sql);
    }
    if ($result == 1){
    echo "<script>alert('Edited Successfully!!');window.location='categoryView.php'</script>";
    }
    else{
     echo "<script>alert('failed');window.location='categoryView.php'</script>";
}
}
?>
