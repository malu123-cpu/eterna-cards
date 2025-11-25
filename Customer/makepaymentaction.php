<?php
session_start();
include("../dboperation.php");
$obj = new dboperation();

if (isset($_POST['submit'])) {
    $amount = $_POST['amount'];
    $type = $_POST['type'] ?? 0;
    $booking_id = $_POST['booking_id'] ?? null;
    $customization_id = $_POST['customization_id'] ?? null;
    $customerid = $_SESSION['customerid'];

    $sql="SELECT * FROM tbl_custreg WHERE customerid='$customerid'";
    $res=$obj->executeQuery($sql);
    $display=mysqli_fetch_array($res);
    $name=$display['customername'];
    $email=$display['email'];

    // Ensure only one ID is provided
    if(($booking_id && $customization_id) || (!$booking_id && !$customization_id)){
        echo "<script>alert('Invalid request: only one ID should be provided.'); window.history.back();</script>";
        exit;
    }

    $payment_date = date('Y-m-d');
    $status = 'paid';

    if ($booking_id) {
        // Insert payment for booking
        $sql = "INSERT INTO tbl_payment (total_amount, date, status, booking_id, type) 
                VALUES ('$amount', '$payment_date', '$status', '$booking_id', '$type')";
        $res = $obj->executequery($sql);

        if ($res) {
            $bodyContent = "Dear $name, Your payment has been received successfully.";
            $mailtoaddress = $email;
            require('phpmailer.php');
            // Update booking status to 'paid'
            $update_sql = "UPDATE tbl_booking SET status='Paid' WHERE booking_id='$booking_id'";
            $obj->executequery($update_sql);

            echo "<script>alert('Payment successful'); window.location='Bookings.php';</script>";
            exit;
        }

    } else {
        // Insert payment for customization
        $sql = "INSERT INTO tbl_payment (total_amount, date, status, customization_id, type) 
                VALUES ('$amount', '$payment_date', '$status', '$customization_id', '$type')";
        $res = $obj->executequery($sql);

        if ($res) {
            $bodyContent = "Dear $name, Your payment has been received successfully.";
            $mailtoaddress = $email;
            require('phpmailer.php');
            // Update customization status to 'paid'
            $update_sql = "UPDATE tblcustomization SET status='Paid' WHERE customization_id='$customization_id'";
            $obj->executequery($update_sql);

            echo "<script>alert('Payment successful'); window.location='mycustomizations.php';</script>";
            exit;
        }
    }
    

    // If neither insertion succeeded
    echo "<script>alert('Payment failed'); window.history.back();</script>";
}
?>
