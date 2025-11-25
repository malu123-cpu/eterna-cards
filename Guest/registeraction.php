<?php
include_once("../dboperation.php");
$obj=new dboperation();
if(isset($_POST['submit']))
{
   
$a=$_POST['customername'];
$b=$_POST['locationname'];
$c=$_POST['email'];
$d=$_POST['contactno'];
$e=$_POST['pincode'];
$f=$_POST['address'];
$g=$_POST['username'];
$h=$_POST['password'];
 
$sql= "select * from  tbl_custreg where customername='$a'";
$res=$obj-> executequery($sql);
$rows=mysqli_num_rows($res);
if($rows > 0){
     echo"<script>alert('Already Exists');window.location='register.php'</script>";
}else{
       $sql="INSERT INTO tbl_custreg (customername,location,email,contactno,pincode,address,username,password) VALUES('$a','$b','$c','$d','$e','$f','$g','$h')";
    $result=$obj->executequery($sql);
    
    if ($result == 1) {
        $bodyContent = "Dear $a, Your registration is approved.";
        $mailtoaddress = $c;
        $redirectPage = 'Login.php';
        require('phpmailer.php');
    } else {
        echo "<script>alert('Registration failed!');window.location='register.php'</script>";
    }
}
}
?>