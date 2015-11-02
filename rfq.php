<?php
$PageTitle = "Request For Quote";
$Banner = "sub-banner-sales.jpg";
$BannerText = "CONTACT US / <strong>REQUEST FOR QUOTE</strong>";
$Description = "Drop us a line! Because our services are supported by our own professional staff we have the insight and sales engineering talent to handle any type and size of project regardless of complexity.";
$Keywords = "contact Sullivan corp, contact Sullivan corporation, contact Sullivan metals, request a quote, request more information, grinding, plate grinding, metal grinding, flame cutting, plasma cutting, stress relieving, steel shot blasting, Blanchard grinding, metal working industry, metal service center, high definition plasma cutting, Sullivan corporation, Sullivan corp, Sullivan metals, plate processing, carbon steel, stainless steel, Wisconsin manufacturing";
include "header.php";

// Settings for randomizing the field names
$ip = $_SERVER['REMOTE_ADDR'];
$timestamp = time();
$salt = "ForesiteGroupSullivan";
?>

<h3>REQUEST FOR QUOTE</h3>

<!-- <div class="half-left"> -->
  <?php
  if (isset($_POST['submit']) && $_POST['confirmationCAP'] == "") {
    if (
          $_POST[md5('name' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
          $_POST[md5('company' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
          $_POST[md5('phone' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
          $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] != ""
        ) {
      // All required fields have been filled, so construct the message
      $SendTo = "sales@thesullivancorp.com";
      $Subject = "RFQ From Sullivan Website";
      $From = "From: RFQ Form <rfqform@thesullivancorp.com>\r\n";
      $From .= "Reply-To: " . $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\r\n";
      
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
      if (!empty($_POST[md5('fax' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
        $Message .= "Fax: " . $_POST[md5('fax' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";
      $Message .= "Email: " . $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";
      
      $Message .= "\n";

      if (!empty($_POST['contact'])) $Message .= "Best to contact me via " . $_POST['contact'] . "\n";

      $Message .= "\n";

      if (!empty($_POST[md5('servicesneeded' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
        $Message .= "Description of Services Needed: " . $_POST[md5('servicesneeded' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";
      if (!empty($_POST[md5('qualitycert' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
        $Message .= "Quality Certification (if any): " . $_POST[md5('qualitycert' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";

      $Message .= "\n";

      if (!empty($_POST['quotedate'])) $Message .= "Quote Information Needed By " . $_POST['quotedate'] . "\n";
      if (!empty($_POST['startdate'])) $Message .= "Service Needed To Start By " . $_POST['startdate'] . "\n";
      if (!empty($_POST['completeddate'])) $Message .= "Service Needed To Be Completed By " . $_POST['completeddate'] . "\n";

      $Message .= "\n";

      if (!empty($_POST[md5('comment' . $_POST['ip'] . $salt . $_POST['timestamp'])]))
        $Message .= "Comment / Special Instructions: " . $_POST[md5('comment' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "\n";
      
      $Message = stripslashes($Message);
      
      mail($SendTo, $Subject, $Message, $From);
      //echo "<pre>$Message</pre><br><br>";
      
      echo "<strong>Your quote has been submitted!</strong><br>\n<br>\nThank you for your interest in Sullivan Metals.  A Sullivan sales engineer will follow up with this RFQ to ensure we understand the details of your manufacturing needs.";
    } else {
      echo "<strong>Some required information is missing! Please go back and make sure all required fields are filled.</strong>";
    }
  } else {
  ?>
  <script type="text/javascript">
    function checkform (form) {
      if (document.getElementById('name').value == "") { alert('Name required.'); document.getElementById('name').focus(); return false ; }
      if (document.getElementById('company').value == "") { alert('Company required.'); document.getElementById('company').focus(); return false ; }
      if (document.getElementById('phone').value == "") { alert('Phone required.'); document.getElementById('phone').focus(); return false ; }
      if (document.getElementById('email').value == "") { alert('Email required.'); document.getElementById('email').focus(); return false ; }
      return true ;
    }
  </script>
  
  Please fill in the fields below so we can process and send your Request For Quote (RFQ) inquiry. A Sullivan sales engineer will follow up with this RFQ to ensure we understand the details of your manufacturing needs. Required fields include *<br>
  <br>

  <form action="rfq.php" method="POST" onSubmit="return checkform(this)" id="contact">
    <div class="half-left">
      <label for="name">Name</label>
      <input type="text" name="<?php echo md5("name" . $ip . $salt . $timestamp); ?>" id="name" placeholder="NAME *"><br>
      <br>

      <label for="company">Company</label>
      <input type="text" name="<?php echo md5("company" . $ip . $salt . $timestamp); ?>" id="company" placeholder="COMPANY *"><br>
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

      <label for="fax">Fax</label>
      <input type="text" name="<?php echo md5("fax" . $ip . $salt . $timestamp); ?>" id="fax" placeholder="FAX"><br>
      <br>

      <label for="email">Email</label>
      <input type="text" name="<?php echo md5("email" . $ip . $salt . $timestamp); ?>" id="email" placeholder="EMAIL *"><br>
      <br>

      <div class="radio">
        <strong>Best to contact me via</strong><br>
        <input type="radio" name="contact" value="Phone" id="phone-r"> <label for="phone-r">Phone</label><br>
        <input type="radio" name="contact" value="Email" id="email-r"> <label for="email-r">Email</label><br>
        <input type="radio" name="contact" value="Fax" id="fax-r"> <label for="fax-r">Fax</label><br>
        <input type="radio" name="contact" value="postedmail" id="postedmail-r"> <label for="postedmail-r">Posted Mail</label>
      </div>
      <br>
    </div>

    <div class="half-right">
      <label for="servicesneeded">Description of Services Needed</label>
      <textarea name="<?php echo md5("servicesneeded" . $ip . $salt . $timestamp); ?>" id="servicesneeded" placeholder="DESCRIPTION OF SERVICES NEEDED"></textarea><br>
      <br>

      <label for="qualitycert">Quality Certification (if any)</label>
      <textarea name="<?php echo md5("qualitycert" . $ip . $salt . $timestamp); ?>" id="qualitycert" placeholder="QUALITY CERTIFICATION (IF ANY)"></textarea><br>
      <br>

      <label for="datepicker1">Quote Information Needed By</label>
      <input type="text" name="quotedate" id="datepicker1" placeholder="QUOTE INFORMATION NEEDED BY" title="QUOTE INFORMATION NEEDED BY"><br>
      <br>

      <label for="datepicker2">Service Needed To Start By</label>
      <input type="text" name="startdate" id="datepicker2" placeholder="SERVICE NEEDED TO START BY" title="SERVICE NEEDED TO START BY"><br>
      <br>

      <label for="datepicker3">Service Needed To Be Completed By</label>
      <input type="text" name="completeddate" id="datepicker3" placeholder="SERVICE NEEDED TO BE COMPLETED BY" title="SERVICE NEEDED TO BE COMPLETED BY"><br>
      <br>

      <label for="comment">Comment / Special Instructions</label>
      <textarea name="<?php echo md5("comment" . $ip . $salt . $timestamp); ?>" id="comment" placeholder="COMMENT / SPECIAL INSTRUCTIONS"></textarea><br>
      <br>
    </div>

    <div style="clear: both;"></div>

    <div>
      <input type="text" name="confirmationCAP" style="display: none;"> <?php // Non-displaying field as a sort of invisible CAPTCHA. ?>
        
      <input type="hidden" name="ip" value="<?php echo $ip; ?>">
      <input type="hidden" name="timestamp" value="<?php echo $timestamp; ?>">

      <button type="submit" name="submit" style="display: block; margin: 0 auto;">SUBMIT</button>
    </div>
  </form>
  <?php } ?>
<!-- </div>

<div class="half-right">
  <strong>Sullivan Corporation</strong><br>
  460 Cardinal Lane<br>
  Hartland, Wisconsin 53029<br>
  <br>

  Phone 262-369-7200<br>
  Fax 262-369-7219
</div>

<div style="clear: both;"></div> -->

<?php include "footer.php"; ?>