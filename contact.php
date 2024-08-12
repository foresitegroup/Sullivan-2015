<?php
$PageTitle = "Contact Us";
$Banner = "sub-banner-sales.webp";
$BannerText = "Contact Us";
$Description = "Drop us a line! Because our services are supported by our own professional staff we have the insight and sales engineering talent to handle any type and size of project regardless of complexity.";
include "header.php";

// Settings for randomizing the field names
$ip = $_SERVER['REMOTE_ADDR'];
$timestamp = time();
$salt = "ForesiteGroupSullivan";
?>

<h2>Sales Contact</h2>

<div class="two-col">
  <div>
    With over 300 years of combined craftsman experience we know how to get your metal processing completed precisely, on time - while saving you money.<br>
    <br>

    As a customer your point of contact is a member of the Sullivan Sales Engineering Team. Because our services are supported by our own professional staff we have the insight and sales engineering talent to handle any type and size of project regardless of complexity.<br>
    <br>

    Your Sales Engineer is available to provide quotations, product availability, and technical assistance for your project.<br>
    <br>

    Call us at <strong>262-369-7200</strong> or Toll Free <strong>800-943-9511</strong>.
  </div>

  <div>
    <strong>Gerry Bohn</strong> - Manager of Sales<br>
    Phone 262-369-7200<br>
    Toll Free 800-943-9511<br>
    Email <?php email("gbohn@sullivanplate.com"); ?><br>
    <br>

    <strong>Ed Rauter</strong><br>
    Phone 262-369-7200<br>
    Toll Free 800-943-9511<br>
    Email <?php email("erauter@sullivanplate.com"); ?><br>
    <br>

    <strong>Sullivan Precision Plate</strong><br>
    460 Cardinal Lane<br>
    Hartland, Wisconsin 53029
  </div>
</div>

<div class="hr"></div>

<h2>General Inquiry</h2>

<div class="two-col">
  <div>
    Please fill in the fields below to be contacted. Required fields include *<br>
    <br>

    <form action="form-contact.php" method="POST" id="contact" class="form" novalidate>
      <div>
        <input type="text" name="username" tabindex="-1" aria-hidden="true" autocomplete="new-password">

        <label>
          Name *
          <input type="text" name="<?php echo md5("name".$ip.$salt.$timestamp); ?>" required>
        </label>

        <label>
          Company
          <input type="text" name="<?php echo md5("company".$ip.$salt.$timestamp); ?>">
        </label>

        <label>
          Phone *
          <input type="tel" name="<?php echo md5("phone".$ip.$salt.$timestamp); ?>" required>
        </label>

        <label>
          Email *
          <input type="email" name="<?php echo md5("email".$ip.$salt.$timestamp); ?>" required>
        </label>

        <label>
          Comment
          <textarea name="<?php echo md5("comment".$ip.$salt.$timestamp); ?>"></textarea>
        </label>

        <div class="radio">
          <strong>Best to contact me via</strong><br>
          <input type="radio" name="contact" value="Phone" id="phone-r">
          <label for="phone-r">Phone</label>

          <input type="radio" name="contact" value="Email" id="email-r">
          <label for="email-r">Email</label>
        </div>

        <input type="hidden" name="ip" value="<?php echo $ip; ?>">
        <input type="hidden" name="timestamp" value="<?php echo $timestamp; ?>">

        <button type="submit" name="submit" id="submit">Submit</button>
      </div>
    </form>
  </div>

  <div>
    <h3>Mailing</h3>
    <strong>Sullivan Precision Plate</strong><br>
    460 Cardinal Lane<br>
    Hartland, Wisconsin 53029<br>
    <br>

    Phone 262-369-7200<br>
    Fax 262-369-7219<br>
    <br>
    <br>

    <h3>Headquarters/Dock/Delivery<br>Hartland, WI</h3>
    <strong>Sullivan Precision Plate</strong><br>
    460 Cardinal Lane<br>
    Hartland, Wisconsin 53029<br>
    <br>
    <br>

    <h3>Dock/Delivery<br>Port of Milwaukee, WI</h3>
    <strong>Sullivan Precision Plate</strong><br>
    2050 S Aldrich St<br>
    Milwaukee, Wisconsin 53204
  </div>
</div>

<div id="modal">
  <div id="modal-box">
    <div id="modal-button"></div>
    <div id="modal-content"></div>
  </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTbHAsLFN-nVXXIDAZiynPZT1DfoDyNwE"></script>
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
      icon: 'images/map-pin.webp'
    });

    var infowindow = new google.maps.InfoWindow({
      content: '<div id="content"><div id="bodyContent"><strong>Sullivan Precision Plate</strong><br>460 Cardinal Ln<br>Hartland, WI 53029<br><a href="https://www.google.com/maps/place/Sullivan+Corporation/@43.095001,-88.351621,15z/data=!4m2!3m1!1s0x0:0x93bc25b7070c5738?hl=en-US" target="new">View larger map</a></div></div>'
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

  // BEGIN form submit
  const form = document.getElementById('contact');
  form.addEventListener('submit', submitForm);

  function submitForm(event) {
    event.preventDefault();

    // Validate any fields with "required" selector
    var valid = 'yes';

    for (const el of form.querySelectorAll('[required]')) {
      if (!el.checkValidity()) {
        document.getElementsByName(el.name).forEach(function (input) {
          input.classList.add('alert');
          input.placeholder = 'REQUIRED';
        });

        valid = 'no';
      }
    }

    // If fields are valid, send the data
    if (valid == 'yes') {
      document.getElementById("submit").classList.add("loader");

      const data = new FormData(form);

      fetch(form.action, {
        method: 'POST',
        body: data
      })
      .then((response) => response.text())
      .then((result) => {
        // Data sent, so display success message in modal
        // and clear all the form fields
        document.getElementById('modal-content').innerHTML = result;
        modal.style.display = "block";
        form.reset();
        
        // Clear alerts
        document.querySelectorAll('.alert').forEach(function (alert) {
          alert.classList.remove('alert');
          alert.placeholder = '';
        });

        document.getElementById("submit").classList.remove("loader");
      });
    }
  } // END rsubmitForm

  const modal = document.getElementById("modal");
  const modalbutton = document.getElementById("modal-button");

  window.onclick = function(event) {
    if (event.target == modal) modal.style.display = "none";
  }

  modalbutton.onclick = function() { modal.style.display = "none"; }
</script>

<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Sullivan Precision Plate",
    "url": "https://sullivanplate.com",
    "image": "https://sullivanplate.com/images/home-banner1.webp",
    "logo": "https://sullivanplate.com/images/logo.webp",
    "description": "Drop us a line! Because our services are supported by our own professional staff we have the insight and sales engineering talent to handle any type and size of project regardless of complexity.",
    "email": "sales@sullivanplate.com",
    "telephone": ["+12623697200", "18009439511"],
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "460 Cardinal Lane",
      "addressLocality": "Hartland",
      "addressRegion": "WI",
      "postalCode": "53029",
      "addressCountry": "US"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": 43.0947044,
      "longitude": -88.3514546
    }
  }
</script>

<?php $Map = "yes"; include "footer.php"; ?>