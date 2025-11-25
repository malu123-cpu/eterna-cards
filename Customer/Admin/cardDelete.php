<?php
include("../dboperation.php");
$obj=new dboperation();

if(isset($_GET["cardid"])) {
  $catid=$_GET["cardid"];

   $sql="select * from tbl_card where cardid=$catid";
  $res=$obj->executequery($sql);
  $display=mysqli_fetch_array($res);


  // Store the image filenames in an array
  $image1Files = ["../Uploads/" . $display["img1"]];
  $image2Files = ["../Uploads/" . $display["img2"]];
  $videoFiles = ["../Uploads2/" . $display["video"]];



   // Delete each image file from the array
  foreach ($imageFiles as $file) 
  {
    if (file_exists($file)) {
        unlink($file);
    }
  }
  
  $sql="delete from tbl_card where cardid=$catid";
  $res=$obj->executequery($sql);
 
  
  }

  echo "<script>alert('Deleted Successfully!!');window.location='cardView.php'</script>";

?>
