<?php
include_once("../dboperation.php");
$obj = new dboperation();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customization_id = intval($_POST['customization_id']);
    $new_status = $_POST['new_status'];

    if ($new_status === 'Accepted') {
        $rate = intval($_POST['rate']);
        $final_card = null;

        if (isset($_FILES['final_card']) && $_FILES['final_card']['error'] == 0) {
            $filename = time() . "_" . basename($_FILES['final_card']['name']);
            $targetPath = "../Uploads/" . $filename;
            move_uploaded_file($_FILES['final_card']['tmp_name'], $targetPath);
            $final_card = $filename;
        }
$sql="SELECT * FROM tblcustomization WHERE customization_id='$customization_id'";
  $res=$obj->executeQuery($sql);
  $display=mysqli_fetch_array($res);
  $a=$display['customerid'];

  $sql2="SELECT * FROM tbl_custreg WHERE customerid='$a'";
  $res2=$obj->executeQuery($sql2);
  $display2=mysqli_fetch_array($res2);
    $name=$display2['customername'];
    $email=$display2['email'];


        $query = "UPDATE tblcustomization 
                  SET status='Accepted', rate='$rate', final_card='$final_card' 
                  WHERE customization_id=$customization_id";
    } 
    elseif ($new_status === 'Rejected') {
        $preview = $_POST['preview'];
        $query = "UPDATE tblcustomization 
                  SET status='Rejected', preview='$preview' 
                  WHERE customization_id=$customization_id";
    } 
    else {
        echo "<script>alert('Invalid status'); window.location.href='viewCustomiztionBookings.php';</script>";
        exit();
    }

    $result = $obj->executeQuery($query);

    if ($result) {
        $bodyContent = "Dear $name, Your customization request has been updated to $new_status.";
        $mailtoaddress = $email;
        require('phpmailer.php');
        echo "<script>alert('Status updated successfully'); window.location.href='viewCustomiztionBookings.php';</script>";
    } else {
        echo "<script>alert('Failed to update status'); window.location.href='viewCustomiztionBookings.php';</script>";
    }
    exit();
} else {
    echo "<script>alert('Invalid request'); window.location.href='viewCustomiztionBookings.php';</script>";
exit();
}
?>
