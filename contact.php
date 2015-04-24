<?php
$PageTitle = "Contact Us";
$Banner = "sub-banner-sales.jpg";
$BannerText = "CONTACT US";
include "header.php";

// Settings for randomizing the field names
$ip = $_SERVER['REMOTE_ADDR'];
$timestamp = time();
$salt = "ForesiteGroupSullivan";
?>

<h3>CONTACT US</h3>

<div class="half-left">
  <?php
  if (isset($_POST['submit']) && $_POST['confirmationCAP'] == "") {
    if (
          $_POST[md5('name' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
          $_POST[md5('phone' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
          $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] != ""
        ) {
      // All required fields have been filled, so construct the message
      $SendTo = "sales@thesullivancorp.com";
      $Subject = "Comment From Sullivan Website";
      $From = "From: Contact Form <contactform@thesullivancorp.com>\r\n";
      $From .= "Reply-To: " . $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\r\n";
      
      $Message = "Comment from " . $_POST[md5('name' . $_POST['ip'] . $salt . $_POST['timestamp'])] . " (" . $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] . ")";

      if (!empty($_POST[md5('company' . $_POST['ip'] . $salt . $_POST['timestamp'])])) $Message .= "\n" . $_POST[md5('company' . $_POST['ip'] . $salt . $_POST['timestamp'])];

      $Message .= "\n" . $_POST[md5('phone' . $_POST['ip'] . $salt . $_POST['timestamp'])];

      if (!empty($_POST['contact'])) $Message .= "\nBest to contact me via " . $_POST['contact'];

      $Message .= "\n\n";
      
      if (!empty($_POST[md5('comment' . $_POST['ip'] . $salt . $_POST['timestamp'])])) $Message .= $_POST[md5('comment' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";
      
      $Message = stripslashes($Message);
      
      mail($SendTo, $Subject, $Message, $From);
      //echo "<pre>$Message</pre><br><br>";
      
      echo "<strong>Your message has been sent!</strong><br>\n<br>\nThank you for your interest in Sullivan Metals.  You will be contacted shortly.";
    } else {
      echo "<strong>Some required information is missing! Please go back and make sure all required fields are filled.</strong>";
    }
  } else {
  ?>
  <script type="text/javascript">
    function checkform (form) {
      if (document.getElementById('name').value == "") { alert('Name required.'); document.getElementById('name').focus(); return false ; }
      if (document.getElementById('phone').value == "") { alert('Phone required.'); document.getElementById('phone').focus(); return false ; }
      if (document.getElementById('email').value == "") { alert('Email required.'); document.getElementById('email').focus(); return false ; }
      return true ;
    }
  </script>
  
  Please fill in the fields below to be contacted. Required fields include *<br>
  <br>

  <form action="contact.php" method="POST" onSubmit="return checkform(this)" id="contact">
    <div>
      <label for="name">Name</label>
      <input type="text" name="<?php echo md5("name" . $ip . $salt . $timestamp); ?>" id="name" placeholder="NAME *"><br>
      <br>

      <label for="company">Company</label>
      <input type="text" name="<?php echo md5("company" . $ip . $salt . $timestamp); ?>" id="company" placeholder="COMPANY"><br>
      <br>

      <label for="phone">Phone</label>
      <input type="text" name="<?php echo md5("phone" . $ip . $salt . $timestamp); ?>" id="phone" placeholder="PHONE *"><br>
      <br>

      <label for="email">Email</label>
      <input type="text" name="<?php echo md5("email" . $ip . $salt . $timestamp); ?>" id="email" placeholder="EMAIL *"><br>
      <br>

      <label for="comment">Comment</label>
      <textarea name="<?php echo md5("comment" . $ip . $salt . $timestamp); ?>" id="comment" placeholder="COMMENT"></textarea><br>
      <br>
      
      <div class="radio">
        <strong>Best to contact me via</strong><br>
        <input type="radio" name="contact" value="Phone" id="phone-r"> <label for="phone-r">Phone</label>
        <input type="radio" name="contact" value="Email" id="email-r"> <label for="email-r">Email</label>
      </div>
      <br>

      <input type="text" name="confirmationCAP" style="display: none;"> <?php // Non-displaying field as a sort of invisible CAPTCHA. ?>
        
      <input type="hidden" name="ip" value="<?php echo $ip; ?>">
      <input type="hidden" name="timestamp" value="<?php echo $timestamp; ?>">

      <button type="submit" name="submit">SUBMIT</button>
    </div>
  </form>
  <?php } ?>
</div>

<div class="half-right">
  <strong>Sullivan Corporation</strong><br>
  460 Cardinal Lane<br>
  Hartland, Wisconsin 53029<br>
  <br>

  Phone 262-369-7200<br>
  Fax 262-369-7219
</div>

<div style="clear: both;"></div>

<?php include "footer.php"; ?>