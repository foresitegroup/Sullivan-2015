<?php
$PageTitle = "Request For Quote";
$Banner = "sub-banner-sales.webp";
$BannerText = "Contact Us / <strong>Request For Quote</strong>";
$Description = "Drop us a line! Because our services are supported by our own professional staff we have the insight and sales engineering talent to handle any type and size of project regardless of complexity.";
include "header.php";

// Settings for randomizing the field names
$ip = $_SERVER['REMOTE_ADDR'];
$timestamp = time();
$salt = "ForesiteGroupSullivan";
?>

<h2>Request For Quote</h2>

Please fill in the fields below so we can process and send your Request For Quote (RFQ) inquiry. A Sullivan sales engineer will follow up with this RFQ to ensure we understand the details of your manufacturing needs. Required fields include *<br>
<br>

<form action="form-rfq.php" method="POST" enctype="multipart/form-data" id="rfq" class="form" novalidate>
  <div class="two-col">
    <div>
      <input type="text" name="username" tabindex="-1" aria-hidden="true" autocomplete="new-password">

      <label>
        Name *
        <input type="text" name="<?php echo md5("name".$ip.$salt.$timestamp); ?>" required>
      </label>

      <label>
        Company *
        <input type="text" name="<?php echo md5("company".$ip.$salt.$timestamp); ?>" required>
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
        Fax
        <input type="text" name="<?php echo md5("fax".$ip.$salt.$timestamp); ?>">
      </label>

      <label>
        Email *
        <input type="email" name="<?php echo md5("email".$ip.$salt.$timestamp); ?>" required>
      </label>

      <strong>Provide document(s)</strong> <span class="note">Only .pdf, .dwg, .dfx, .doc, .docx, .xls, .xlsx or .txt allowed.</span><br>
      <input type="file" name="file1" id="file1"><br>
      <input type="file" name="file2" id="file2"><br>
      <input type="file" name="file3" id="file3"><br>
      <div class="note">Please limit document sizes to no more than 1MB per file. If you need to send more than three documents or your documents exceed the upload limit please call us at 800-943-9511.</div>
    </div>

    <div>
      <label>
        Description of Services Needed
        <textarea name="<?php echo md5("servicesneeded".$ip.$salt.$timestamp); ?>"></textarea>
      </label>

      <label>
        Quality Certification (if any)
        <textarea name="<?php echo md5("qualitycert".$ip.$salt.$timestamp); ?>"></textarea>
      </label>

      <label>
        Quote Information Needed By
        <input type="date" name="quotedate">
      </label>

      <label>
        Service Needed To Start By
        <input type="date" name="startdate">
      </label>

      <label>
        Service Needed To Be Completed By
        <input type="date" name="completeddate">
      </label>

      <label>
        Comment / Special Instructions
        <textarea name="<?php echo md5("comment".$ip.$salt.$timestamp); ?>"></textarea>
      </label>
    </div>
  </div>

  <div class="radio" style="text-align: center; padding: 1em 0;">
    <strong>Best to contact me via</strong><br>
    <input type="radio" name="contact" value="Phone" id="phone-r">
    <label for="phone-r">Phone</label>

    <input type="radio" name="contact" value="Email" id="email-r">
    <label for="email-r">Email</label>

    <input type="radio" name="contact" value="Fax" id="fax-r">
    <label for="fax-r">Fax</label>

    <input type="radio" name="contact" value="Posted Mail" id="postedmail-r">
    <label for="postedmail-r">Posted Mail</label>
  </div>

  <div>
    <input type="hidden" name="ip" value="<?php echo $ip; ?>">
    <input type="hidden" name="timestamp" value="<?php echo $timestamp; ?>">

    <button type="submit" name="submit" id="submit">Submit</button>
  </div>
</form>

<div id="modal">
  <div id="modal-box">
    <div id="modal-button"></div>
    <div id="modal-content"></div>
  </div>
</div>

<script>
  // BEGIN form submit
  const form = document.getElementById('rfq');
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