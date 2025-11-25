
<?php
include_once("../dboperation.php");
$obj=new dboperation();
if(isset($_POST['Submit']))
{
$n=$_POST['districtid'];
$d=$_POST['locationname'];
$sql= "select * from  tbl_location where locationname='$d'";
$res=$obj-> executequery($sql);
$rows=mysqli_num_rows($res);
if($rows > 0){
     echo"<script>alert('Already Exists');window.location='location.php'</script>";
}else{
       $sql="INSERT INTO tbl_location (districtid, locationname) VALUES('$n', '$d')";
    $result=$obj->executequery($sql);
    
  if ($result == 1) {
            echo "<script>alert('Registration Sucessfull');window.location='location.php'</script>";
        } else {
            echo "<script>alert('Failed!');window.location='location.php'</script>";
        }
}
}
?>

