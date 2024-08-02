<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'inc/PHPMailer/Exception.php';
require 'inc/PHPMailer/PHPMailer.php';
require 'inc/PHPMailer/SMTP.php';

include_once "inc/fintoozler.php";

$salt = "ForesiteGroupSullivan";

if (
  $_POST[md5('name'.$_POST['ip'].$salt.$_POST['timestamp'])] != "" &&
  $_POST[md5('phone'.$_POST['ip'].$salt.$_POST['timestamp'])] != "" &&
  $_POST[md5('email'.$_POST['ip'].$salt.$_POST['timestamp'])] != ""
) {
  if ($_POST['username'] == "") {
    $mail = new PHPMailer(true);

    $mail->SMTPAuth = true;
    $mail->Username = SMTP_USER;
    $mail->Password = SMTP_PASS;
    $mail->Host = SMTP_HOST;
    $mail->Port = SMTP_PORT;

    $mail->setFrom(SMTP_USER, 'Contact Form');
    $mail->addAddress('gbohn@sullivanplate.com');
    $mail->addAddress('erauter@sullivanplate.com');
    $mail->addBCC('foresitegroupllc@gmail.com');
    $mail->addReplyTo($_POST[md5('email'.$_POST['ip'].$salt.$_POST['timestamp'])]);
    $mail->Subject = 'Comment From Sullivan Website';

    $Message = "Comment from " . $_POST[md5('name' . $_POST['ip'] . $salt . $_POST['timestamp'])] . " (" . $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] . ")";

    if (!empty($_POST[md5('company' . $_POST['ip'] . $salt . $_POST['timestamp'])])) $Message .= "\n" . $_POST[md5('company' . $_POST['ip'] . $salt . $_POST['timestamp'])];

    $Message .= "\n" . $_POST[md5('phone' . $_POST['ip'] . $salt . $_POST['timestamp'])];

    if (!empty($_POST['contact'])) $Message .= "\nBest to contact me via " . $_POST['contact'];

    if (!empty($_POST[md5('comment' . $_POST['ip'] . $salt . $_POST['timestamp'])])) $Message .= "\n\n" . $_POST[md5('comment' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";

    $Message = stripslashes($Message);

    $mail->Body = $Message;

    $mail->send();

    $feedback = "<strong>Your message has been sent!</strong><br>\n<br>\nThank you for your interest in Sullivan Precision Plate. You will be contacted shortly.";
  } // Honeypot
} else {
  $feedback = "<strong>Some required information is missing! Please go back and make sure all required fields are filled.</strong>";
} // Required fields

echo $feedback;
?>