
<?php
include_once("../dboperation.php");
$obj=new dboperation();
if(isset($_POST['Submit']))
{
$n=$_POST['districtname'];
$sql= "select * from  tbl_district where districtname='$n'";
$res=$obj-> executequery($sql);
$rows=mysqli_num_rows($res);
if($rows > 0){
     echo"<script>alert('Already Exists');window.location='district.php'</script>";
}else{
       $sql="INSERT INTO tbl_district (districtname) VALUES('$n')";
    $result=$obj->executequery($sql);
    
  if ($result == 1) {
            echo "<script>alert('Sucessfull');window.location='district.php'</script>";
        } else {
            echo "<script>alert('Failed!');window.location='district.php'</script>";
        }
}
}
?>
