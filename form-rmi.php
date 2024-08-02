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

    $mail->setFrom(SMTP_USER, 'RMI Form');
    $mail->addAddress('gbohn@sullivanplate.com');
    $mail->addAddress('erauter@sullivanplate.com');
    $mail->addBCC('foresitegroupllc@gmail.com');
    $mail->addReplyTo($_POST[md5('email'.$_POST['ip'].$salt.$_POST['timestamp'])]);
    $mail->Subject = 'RMI From Sullivan Website';

    $Message = "Name: " . $_POST[md5('name' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";

    if (!empty($_POST[md5('company' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "Company: " . $_POST[md5('company' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";

    if (!empty($_POST[md5('address' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "Address: " . $_POST[md5('address' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";
    if (!empty($_POST[md5('city' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "City: " . $_POST[md5('city' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";
    if (!empty($_POST[md5('state' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "State: " . $_POST[md5('state' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";
    if (!empty($_POST[md5('zip' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "Zip: " . $_POST[md5('zip' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";

    $Message .= "Phone: " . $_POST[md5('phone' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";
    $Message .= "Email: " . $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";

    if (!empty($_POST['contact'])) $Message .= "\nBest to contact me via " . $_POST['contact'] . "\n";

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