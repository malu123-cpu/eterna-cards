<?php
include_once("../dboperation.php");
$obj=new dboperation();
if (isset($_POST["Submit"]))
{
    $id=$_POST['cardid'];
    $cardname=$_POST['cardname'];
    $nocopies=$_POST['no_copies'];
    $image1=$_FILES["img1"]["name"];
    move_uploaded_file($_FILES["img1"]["tmp_name"], "../Uploads/".$image1);
     if($image1=='')
    {
    $sql1="UPDATE tbl_card set cardname='$cardname',no_copies='$nocopies' where cardid='$id'";
    $result=$obj->executequery($sql1);
    }
    else{
        $sql="UPDATE tbl_card set cardname='$cardname',no_copies='$nocopies',img1='$image1' where cardid='$id'";
    $result=$obj->executequery($sql);
    }

    $image2=$_FILES["img2"]["name"];
    move_uploaded_file($_FILES["img2"]["tmp_name"], "../Uploads/".$image2);
    if($image2=='')
    {
    $sql1="UPDATE tbl_card set cardname='$cardname',no_copies='$nocopies',img1='$image1' where cardid='$id'";
    $result=$obj->executequery($sql1);
    }
    else{
        $sql="UPDATE tbl_card set cardname='$cardname',no_copies='$nocopies',img1='$image1',img2='$image2' where cardid='$id'";
    $result=$obj->executequery($sql);
    }
    $designprice=$_POST['designprice'];

    $video=$_FILES["video"]["name"];
    move_uploaded_file($_FILES["video"]["tmp_name"], "../Uploads2/".$video);
     if($video=='')
    {
    $sql1="UPDATE tbl_card set cardname='$cardname',no_copies='$nocopies',img1='$image1',img2='$image2',designprice='$designprice' where cardid='$id'";
    $result=$obj->executequery($sql1);
    }
    else{
        $sql="UPDATE tbl_card set cardname='$cardname',no_copies='$nocopies',img1='$image1',img2='$image2',designprice='$designprice',video='$video' where cardid='$id'";
    $result=$obj->executequery($sql);
    }

    if ($result == 1){
     echo "<script>alert('Saved Succesfully');</script>";
    }
    else{
     echo "<script>alert('Registration failed'); </script>";
}
}
?>
