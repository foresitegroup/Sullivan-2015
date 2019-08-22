<?php
$PageTitle = "Request More Information";
$Banner = "sub-banner-sales.jpg";
$BannerText = "CONTACT US / <strong>REQUEST MORE INFORMATION</strong>";
$Description = "Drop us a line! Because our services are supported by our own professional staff we have the insight and sales engineering talent to handle any type and size of project regardless of complexity.";
$Keywords = "contact Sullivan corp, contact Sullivan corporation, contact Sullivan metals, request a quote, request more information, grinding, plate grinding, metal grinding, flame cutting, plasma cutting, stress relieving, steel shot blasting, Blanchard grinding, metal working industry, metal service center, high definition plasma cutting, Sullivan corporation, Sullivan corp, Sullivan metals, plate processing, carbon steel, stainless steel, Wisconsin manufacturing";
include "header.php";

// Settings for randomizing the field names
$ip = $_SERVER['REMOTE_ADDR'];
$timestamp = time();
$salt = "ForesiteGroupSullivan";
?>

<h3>REQUEST MORE INFORMATION</h3>

<div class="half-left">
  <?php
  if (isset($_POST['submit']) && $_POST['confirmationCAP'] == "") {
    if (
          $_POST[md5('name' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
          $_POST[md5('phone' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
          $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] != ""
        ) {
      // All required fields have been filled, so construct the message
      $SendTo = "gbohn@sullivanplate.com, erauter@sullivanplate.com";
      $Subject = "RMI From Sullivan Website";
      $From = "From: RMI Form <rmiform@sullivanplate.com>\r\n";
      $From .= "Reply-To: " . $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\r\n";
      $From .= "Bcc: foresitegroupllc@gmail.com\r\n";
      
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
      
      mail($SendTo, $Subject, $Message, $From);
      
      echo "<strong>Your message has been sent!</strong><br>\n<br>\nThank you for your interest in Sullivan Precision Plate.  You will be contacted shortly.";
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
  
  Please fill in the fields below so we can return to you more information about Sullivan Precision Plate. Required fields include *<br>
  <br>

  <form action="rmi.php" method="POST" onSubmit="return checkform(this)" id="contact">
    <div>
      <label for="name">Name</label>
      <input type="text" name="<?php echo md5("name" . $ip . $salt . $timestamp); ?>" id="name" placeholder="NAME *"><br>
      <br>

      <label for="company">Company</label>
      <input type="text" name="<?php echo md5("company" . $ip . $salt . $timestamp); ?>" id="company" placeholder="COMPANY"><br>
      <br>

      <label for="address">Address</label>
      <input type="text" name="<?php echo md5("address" . $ip . $salt . $timestamp); ?>" id="address" placeholder="ADDRESS"><br>
      <br>

      <label for="city">City</label>
      <input type="text" name="<?php echo md5("city" . $ip . $salt . $timestamp); ?>" id="city" placeholder="CITY"><br>
      <br>
      
      <div class="half-left">
        <label for="state">State</label>
        <input type="text" name="<?php echo md5("state" . $ip . $salt . $timestamp); ?>" id="state" placeholder="STATE"><br>
        <br>
      </div>
      
      <div class="half-right">
        <label for="zip">Zip</label>
        <input type="text" name="<?php echo md5("zip" . $ip . $salt . $timestamp); ?>" id="zip" placeholder="ZIP"><br>
        <br>
      </div>

      <div style="clear: both;"></div>

      <label for="phone">Phone</label>
      <input type="text" name="<?php echo md5("phone" . $ip . $salt . $timestamp); ?>" id="phone" placeholder="PHONE *"><br>
      <br>

      <label for="email">Email</label>
      <input type="text" name="<?php echo md5("email" . $ip . $salt . $timestamp); ?>" id="email" placeholder="EMAIL *"><br>
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
  <strong>Sullivan Precision Plate</strong><br>
  460 Cardinal Lane<br>
  Hartland, Wisconsin 53029<br>
  <br>

  Phone 262-369-7200<br>
  Fax 262-369-7219
</div>

<div style="clear: both;"></div>

<?php include "footer.php"; ?>