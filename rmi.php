<?php
$PageTitle = "Request More Information";
$Banner = "sub-banner-sales.webp";
$BannerText = "CONTACT US / <strong>REQUEST MORE INFORMATION</strong>";
$Description = "Drop us a line! Because our services are supported by our own professional staff we have the insight and sales engineering talent to handle any type and size of project regardless of complexity.";
include "header.php";

// Settings for randomizing the field names
$ip = $_SERVER['REMOTE_ADDR'];
$timestamp = time();
$salt = "ForesiteGroupSullivan";
?>

<h2>Request More Information</h2>

<div class="two-col">
  <div>
    Please fill in the fields below so we can return to you more information about Sullivan Precision Plate. Required fields include *<br>
    <br>

    <form action="form-rmi.php" method="POST" id="rmi" class="form" novalidate>
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
        Address
        <input type="text" name="<?php echo md5("address".$ip.$salt.$timestamp); ?>">
      </label>

      <label>
        City
        <input type="text" name="<?php echo md5("city".$ip.$salt.$timestamp); ?>">
      </label>
      
      <div class="two-col">
        <div>
          <label>
            State
            <input type="text" name="<?php echo md5("state".$ip.$salt.$timestamp); ?>">
          </label>
        </div>
        
        <div>
          <label>
            Zip
            <input type="text" name="<?php echo md5("zip".$ip.$salt.$timestamp); ?>">
          </label>
        </div>
      </div>

        <label>
          Phone *
          <input type="tel" name="<?php echo md5("phone".$ip.$salt.$timestamp); ?>" required>
        </label>

        <label>
          Email *
          <input type="email" name="<?php echo md5("email".$ip.$salt.$timestamp); ?>" required>
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
    <strong>Sullivan Precision Plate</strong><br>
    460 Cardinal Lane<br>
    Hartland, Wisconsin 53029<br>
    <br>

    Phone 262-369-7200<br>
    Fax 262-369-7219
  </div>
</div>

<div id="modal">
  <div id="modal-box">
    <div id="modal-button"></div>
    <div id="modal-content"></div>
  </div>
</div>

<script>
  // BEGIN form submit
  const form = document.getElementById('rmi');
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

<?php include "footer.php"; ?>