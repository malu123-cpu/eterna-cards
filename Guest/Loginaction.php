<?php
session_start();
include_once("../dboperation.php");
$obj = new dboperation();
$username = $_POST["username"];
$password = $_POST["password"];


$sqlquery = "select * from tbl_adminlogin where username='$username' and password='$password'";
$result= $obj->executequery($sqlquery);
if (mysqli_num_rows($result) == 1) {
   $row = mysqli_fetch_array($result);
   $_SESSION["username"] = $username;
   $_SESSION["loginid"] = $row["loginid"];
   $_SESSION["usertype"] = "admin";


   header("location:..\Admin\adminindex.php");
    exit();
}

$sql_cust = "SELECT * FROM tbl_custreg WHERE username='$username' AND password='$password'";
$result_cust = $obj->executequery($sql_cust);

if (mysqli_num_rows($result_cust) == 1) {
    $row = mysqli_fetch_array($result_cust);
    $_SESSION["username"] = $username;
    $_SESSION["customerid"] = $row["customerid"];
    $_SESSION["usertype"] = "customer";
    header("location:../Customer/custindex.php");
    exit();
}
     
         echo "<script>alert('Invalid Username/Password!!'); window.location='login.php'</script>";



?>
