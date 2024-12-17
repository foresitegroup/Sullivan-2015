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
  $_POST[md5('company'.$_POST['ip'].$salt.$_POST['timestamp'])] != "" &&
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

    $mail->setFrom(SMTP_USER, 'RFQ Form');
    $mail->addAddress('gbohn@sullivanplate.com');
    $mail->addAddress('erauter@sullivanplate.com');
    $mail->addBCC('foresitegroupllc@gmail.com');
    $mail->addReplyTo($_POST[md5('email'.$_POST['ip'].$salt.$_POST['timestamp'])]);
    $mail->Subject = 'RFQ From Sullivan Website';

    $Message = "Name: ".$_POST[md5('name'.$_POST['ip'].$salt.$_POST['timestamp'])]."\n";

    $Message .= "Company: ".$_POST[md5('company'.$_POST['ip'].$salt.$_POST['timestamp'])]."\n";

    if (!empty($_POST[md5('address' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "Address: " . $_POST[md5('address' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";
    if (!empty($_POST[md5('city' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "City: " . $_POST[md5('city' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";
    if (!empty($_POST[md5('state' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "State: " . $_POST[md5('state' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";
    if (!empty($_POST[md5('zip' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "Zip: " . $_POST[md5('zip' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";

    $Message .= "Phone: " . $_POST[md5('phone' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";
    if (!empty($_POST[md5('fax' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "Fax: " . $_POST[md5('fax' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";
    $Message .= "Email: " . $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";
    
    $Message .= "\n";

    if (!empty($_POST['contact'])) $Message .= "Best to contact me via " . $_POST['contact'] . "\n\n";

    if (!empty($_POST[md5('servicesneeded' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "Description of Services Needed: " . $_POST[md5('servicesneeded' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n\n";

    if (!empty($_POST[md5('qualitycert' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "Quality Certification (if any): " . $_POST[md5('qualitycert' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n\n";

    if (!empty($_POST['quotedate'])) $Message .= "Quote Information Needed By " . $_POST['quotedate'] . "\n";
    if (!empty($_POST['startdate'])) $Message .= "Service Needed To Start By " . $_POST['startdate'] . "\n";
    if (!empty($_POST['completeddate'])) $Message .= "Service Needed To Be Completed By " . $_POST['completeddate'] . "\n";

    if (!empty($_POST[md5('comment' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
      $Message .= "\nComment / Special Instructions: " . $_POST[md5('comment' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";

    // ATTACHMENTS
    $allowed = array("pdf","dwg","dfx","doc","docx","xls","xlsx","txt");
    $InvalidFile = "no";
    $TooBig = "no";

    if ($_FILES['file1']['tmp_name'] != "") {
      if ($_FILES['file1']['size'] <= 1048576) {
        // File size is OK, so check if it's the correct type
        if (in_array(strtolower(pathinfo($_FILES['file1']['name'], PATHINFO_EXTENSION)), $allowed)) {
          $mail->addAttachment($_FILES['file1']['tmp_name'], $_FILES['file1']['name']);
        } else {
          // Invalid file type, so make a note that it didn't attach.
          $InvalidFile = "yes";
        }
      } else {
        // File size is too big, so make a note that it didn't attach.
        $TooBig = "yes";
      }
    }

    if ($_FILES['file2']['tmp_name'] != "") {
      if ($_FILES['file2']['size'] <= 1048576) {
        // File size is OK, so check if it's the correct type
        if (in_array(strtolower(pathinfo($_FILES['file2']['name'], PATHINFO_EXTENSION)), $allowed)) {
          $mail->addAttachment($_FILES['file2']['tmp_name'], $_FILES['file2']['name']);
        } else {
          // Invalid file type, so make a note that it didn't attach.
          $InvalidFile = "yes";
        }
      } else {
        // File size is too big, so make a note that it didn't attach.
        $TooBig = "yes";
      }
    }

    if ($_FILES['file3']['tmp_name'] != "") {
      if ($_FILES['file3']['size'] <= 1048576) {
        // File size is OK, so check if it's the correct type
        if (in_array(strtolower(pathinfo($_FILES['file3']['name'], PATHINFO_EXTENSION)), $allowed)) {
          $mail->addAttachment($_FILES['file3']['tmp_name'], $_FILES['file3']['name']);
        } else {
          // Invalid file type, so make a note that it didn't attach.
          $InvalidFile = "yes";
        }
      } else {
        // File size is too big, so make a note that it didn't attach.
        $TooBig = "yes";
      }
    }

    if ($TooBig == "yes") $Message .= "\n\nNOTE: This person tried to attach a file that was too big; it was not sent with this message.";
    if ($InvalidFile == "yes") $Message .= "\n\nNOTE: This person tried to attach an invalid file type; it was not sent with this message.";

    $Message = stripslashes($Message);

    $mail->Body = $Message;

    $mail->send();

    $feedback = "<strong>Your quote has been submitted!</strong><br>\n<br>\nThank you for your interest in Sullivan Precision Plate.  A Sullivan sales engineer will follow up with this RFQ to ensure we understand the details of your manufacturing needs.";
  } // Honeypot
} else {
  $feedback = "<strong>Some required information is missing! Please go back and make sure all required fields are filled.</strong>";
} // Required fields

echo $feedback;
?>