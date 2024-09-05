    </div>
    
    <?php if ($PageTitle == "") { ?>
    <div id="spiffs">
      <div class="site-width">
        <a href="<?php echo $TopDir; ?>grinding.php" aria-label="Blanchard Grinding">
          <div class="image" style="background-image: url(<?php echo $TopDir; ?>images/grinding2.webp);"></div>
          <div class="sep"></div>
          <h3>Blanchard Grinding</h3>
          Sullivan Precision Plate has a grinder to meet almost every need. Grinding is where we have made our name, expanding on our services to meet the diverse needs of our customers &amp; an ever-changing economy.
          <div class="more">More</div>
        </a>

        <a href="<?php echo $TopDir; ?>stress-relieving.php" aria-label="Stress Relieving">
          <div class="image" style="background-image: url(<?php echo $TopDir; ?>images/stress-relieving3.webp);"></div>
          <div class="sep"></div>
          <h3>Stress Relieving</h3>
          Thermal Stress Relieving is an annealing process that heats the metal below the austenite phase to reduce distortions or changes in dimensions that might occur after shaping.
          <div class="more">More</div>
        </a>

        <a href="<?php echo $TopDir; ?>oxy-fuel-cutting.php" aria-label="Oxy-Fuel Cutting">
          <div class="image" style="background-image: url(<?php echo $TopDir; ?>images/oxy-fuel-cutting-2.webp);"></div>
          <div class="sep"></div>
          <h3>Oxy-Fuel Cutting</h3>
          Oxy-Fuel Cutting will produce products that range from simple rectangles, circles, and rings, to intricate shapes custom-cut to specification.<br><br>
          <div class="more">More</div>
        </a>

        <a href="<?php echo $TopDir; ?>steel-shot-blasting.php" aria-label="Shot Blasting">
          <div class="image" style="background-image: url(<?php echo $TopDir; ?>images/spiff-shot-blasting.webp);"></div>
          <div class="sep"></div>
          <h3>Shot Blasting</h3>
          Shot Blasting is the operation of cleaning or preparing a surface by forcibly propelling a stream of abrasive material against it under high pressure.<br><br>
          <div class="more">More</div>
        </a>
      </div>
    </div>
    <?php } ?>

    <?php if (!empty($Map)) { ?>
    <div id="map-canvas"></div>
    <?php } ?>
    
    <?php if (empty($Inventory)) { ?>
    <div id="inventory">
      <div class="site-width">
        We carry and sell multiple types of steel in a wide variety of sizes.<br>
        <em>Ask about our inventory today!</em>
      </div>
    </div>
    <?php } ?>

    <div id="callus">
      Call Us: <span>800-943-9511</span>
    </div>

    <footer>
      <div class="site-width">
        <div class="contact">
          <img src="<?php echo $TopDir; ?>images/logo-footer.webp" alt="" width="800" height="254" id="logo-footer">

          <div>
            <strong>Sullivan Precision Plate</strong><br>
            460 Cardinal Lane<br>
            Hartland, Wisconsin 53029
          </div>

          <div>
            <strong>P:</strong> (262) 369-7200<br>
            <strong>F:</strong> (262) 369-7219<br>
            <strong>E:</strong> <?php email("sales@sullivanplate.com"); ?>
          </div>
        </div> <!-- /.contact -->

        <nav class="menu">
          <?php include "menu.php"; ?>
        </nav>
      </div>

      <div class="ribbon">
        <div class="site-width">
          <form action="https://sullivanplate.us9.list-manage.com/subscribe/post?u=ea81a5c72e0c67b68b6773973&amp;id=f9cd0f3687&amp;f_id=003021e1f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_self" novalidate="">
            <div id="mc_embed_signup_scroll">
              <div id="mce-responses" class="clear foot">
                <div class="response" id="mce-error-response" style="display: none;"></div>
                <div class="response" id="mce-success-response" style="display: none;"></div>
              </div>
              <div style="position: absolute; left: -5000px;" aria-hidden="true">
                <input type="text" name="b_ea81a5c72e0c67b68b6773973_f9cd0f3687" tabindex="-1" value="">
              </div>
              <div class="buttongroup">
                <input type="email" name="EMAIL" class="required email" id="mce-EMAIL" required="" value="" placeholder="EMAIL SIGN UP" aria-label="Email sign up">
                <input type="submit" name="subscribe" id="mc-embedded-subscribe" class="button" value="Submit" aria-label="Submit">
              </div> <!-- /.buttongroup -->
            </div> <!-- /#mc_embed_signup_scroll -->
          </form>

          <div>
            &copy; <?php echo date("Y"); ?> All rights reserved, Sullivan Precision Plate. Site by <a href="https://foresitegrp.com" style="text-decoration: underline;">Foresite Group</a>
          </div>
        </div>
      </div> <!-- /.ribbon -->
    </footer>

    <script>
      // Open external links and PDFs in new tab
      [...document.links].forEach(link => {
        if (link.hostname != window.location.hostname || link.href.split('.').pop() == "pdf") {
          link.target = '_blank'; link.rel = 'noopener';
        }
      });
    </script>
    
  </body>
</html>