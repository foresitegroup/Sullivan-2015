<?php
$PageTitle = "Contact Us";
$Banner = "sub-banner-sales.jpg";
$BannerText = "CONTACT US";
$Description = "Drop us a line! Because our services are supported by our own professional staff we have the insight and sales engineering talent to handle any type and size of project regardless of complexity.";
$Keywords = "contact Sullivan corp, contact Sullivan corporation, contact Sullivan metals, request a quote, request more information, grinding, plate grinding, metal grinding, flame cutting, plasma cutting, stress relieving, steel shot blasting, Blanchard grinding, metal working industry, metal service center, high definition plasma cutting, Sullivan corporation, Sullivan corp, Sullivan metals, plate processing, carbon steel, stainless steel, Wisconsin manufacturing";
include "header.php";

// Settings for randomizing the field names
$ip = $_SERVER['REMOTE_ADDR'];
$timestamp = time();
$salt = "ForesiteGroupSullivan";
?>

<h3>SALES CONTACT</h3>

<div class="half-left">
  With over 300 years of combined craftsman experience we know how to get your metal processing completed precisely, on time - while saving you money.<br>
  <br>

  As a customer your point of contact is a member of the Sullivan Sales Engineering Team. Because our services are supported by our own professional staff we have the insight and sales engineering talent to handle any type and size of project regardless of complexity.<br>
  <br>

  Your Sales Engineer is available to provide quotations, product availability, and technical assistance for your project.<br>
  <br>

  Call us at <strong>262-369-7200</strong> or Toll Free <strong>800-943-9511</strong>.
</div>

<div class="half-right">
  <strong>Gerry Bohn</strong> - Manager of Sales<br>
  Phone 262-369-7200<br>
  Toll Free 800-943-9511<br>
  Email <?php email("gbohn@thesullivancorp.com"); ?><br>
  <br>

  <strong>Ed Rauter</strong><br>
  Phone 262-369-7200<br>
  Toll Free 800-943-9511<br>
  Email <?php email("erauter@thesullivancorp.com"); ?><br>
  <br>

  <strong>Sullivan Corporation</strong><br>
  460 Cardinal Lane<br>
  Hartland, Wisconsin 53029<br>
</div>

<div style="clear: both;"></div>

<hr class="fancy fancy-em">

<h3>GENERAL INQUIRY</h3>

<div class="half-left">
  <?php
  if (isset($_POST['submit']) && $_POST['confirmationCAP'] == "") {
    if (
          $_POST[md5('name' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
          $_POST[md5('phone' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" &&
          $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] != ""
        ) {
      // All required fields have been filled, so construct the message
      $SendTo = "gbohn@thesullivancorp.com, erauter@thesullivancorp.com, sales@thesullivancorp.com, mark@foresitegrp.com";
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
  <h4>MAILING</h4>
  <strong>Sullivan Corporation</strong><br>
  460 Cardinal Lane<br>
  Hartland, Wisconsin 53029<br>
  <br>

  Phone 262-369-7200<br>
  Fax 262-369-7219<br>
  <br>
  <br>

  <h4>HEADQUARTERS/DOCK/DELIVERY<br>HARTLAND, WI</h4>
  <strong>Sullivan Corporation</strong><br>
  460 Cardinal Lane<br>
  Hartland, Wisconsin 53029<br>
  <br>
  <br>

  <h4>DOCK/DELIVERY<br>PORT OF MILWAUKEE, WI</h4>
  <strong>Sullivan Corporation</strong><br>
  2050 S Aldrich St<br>
  Milwaukee, Wisconsin 53204
</div>

<div style="clear: both;"></div>

<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
  function ViewLargerMap(VLMa, map) {
    var VLMui = document.createElement('a');
    VLMui.style.cursor = 'pointer';
    VLMui.href = 'https://www.google.com/maps/place/Sullivan+Corporation/@43.095001,-88.351621,15z/data=!4m2!3m1!1s0x0:0x93bc25b7070c5738?hl=en-US';
    VLMui.target = 'new';
    VLMui.innerHTML = 'View larger map';
    VLMui.style.marginLeft = '7px';
    VLMa.appendChild(VLMui);
  }

  function initialize() {
    var MyLatLng = new google.maps.LatLng(43.095001,-88.351621);
    var mapCanvas = document.getElementById('map-canvas');
    var mapOptions = {
      center: MyLatLng,
      zoom: 16,
      disableDefaultUI: true,
      zoomControl: true,
      zoomControlOptions: {
        style: google.maps.ZoomControlStyle.SMALL,
        position: google.maps.ControlPosition.RIGHT_BOTTOM
      },
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    var map = new google.maps.Map(mapCanvas, mapOptions)
    map.set('styles', [
      {
        stylers: [
          //{ hue: '#1B75BB' },
          { "saturation": -100 },
          { "visibility": "simplified" }
        ]
      }
    ]);

    var marker = new google.maps.Marker({
      position: MyLatLng,
      map: map,
      icon: 'images/map-pin.png'
    });

    var infowindow = new google.maps.InfoWindow({
      content: '<div id="content"><div id="bodyContent"><strong>Sullivan Corporation</strong><br>460 Cardinal Ln<br>Hartland, WI 53029<br><a href="https://www.google.com/maps/place/Sullivan+Corporation/@43.095001,-88.351621,15z/data=!4m2!3m1!1s0x0:0x93bc25b7070c5738?hl=en-US" target="new">View larger map</a></div></div>'
    });

    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker);
    });

    var vlmDiv = document.createElement('div');
    var vlm = new ViewLargerMap(vlmDiv, map);
    vlmDiv.index = 1;
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(vlmDiv);
  }

  google.maps.event.addDomListener(window, 'load', initialize);
</script>

<?php $Map = "yes"; include "footer.php"; ?>