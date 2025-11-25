<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'malumr2006@gmail.com';
    $mail->Password   = 'fefoilwoihsqqwxo';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->Timeout = 60;
    
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->setFrom('malumr2006@gmail.com', 'Eterna Cards');
    $mail->addAddress($mailtoaddress, $a);

    $mail->isHTML(true);
    $mail->Subject = 'Registration Successful';
    $mail->Body    = $bodyContent;

   

    $mail->send();
    echo "<script>alert('Registered Successfully. Email sent.'); window.location='Login.php';</script>";
    exit;

} catch (Exception $e) {
    echo 'Email could not be sent. Error: ', $mail->ErrorInfo;
}
?>