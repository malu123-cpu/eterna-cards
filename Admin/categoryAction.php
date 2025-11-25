
<?php
include_once("../dboperation.php");
$obj=new dboperation();
if(isset($_POST['Submit']))
{
$n=$_POST['Categoryname'];
$image=$_FILES['Categoryimg']['name'];
move_uploaded_file($_FILES['Categoryimg']["tmp_name"],"../Uploads/".$image);
$d=$_POST['Description'];
$sql= "select * from  tbl_category where Categoryname='$n'";
$res=$obj-> executequery($sql);
$rows=mysqli_num_rows($res);
if($rows > 0){
     echo"<script>alert('Already Exists');window.location='category.php'</script>";
}else{
       $sql="INSERT INTO tbl_category (Categoryname,Description,Categoryimg) VALUES('$n','$d','$image')";
    $result=$obj->executequery($sql);
    
  if ($result == 1) {
            echo "<script>alert('Registration Sucessfully');window.location='category.php'</script>";
        } else {
            echo "<script>alert('Registration failed!');window.location='category.php'</script>";
        }
}
}
?>
