    </article>
    
    <?php if ($PageTitle == "") { ?>
    <div id="spiffs">
      <article>
        <a href="<?php echo $TopDir; ?>grinding.php" class="spiff spiff-left">
          <div class="spiff-img"><img src="<?php echo $TopDir; ?>images/spiff-hover.png" alt=""></div>
          <div class="spiff-sep"></div>
          <h1>BLANCHARD GRINDING</h1>
          <div class="spiff-text">
            Sullivan Precision Plate has a grinder to meet almost every need. Grinding is where we have made our name, expanding on our services to meet the diverse needs of our customers &amp; an ever-changing economy.
          </div>
          <div class="readmore">MORE <div class="fa fa-angle-double-right"></div></div>
        </a>

        <a href="<?php echo $TopDir; ?>stress-relieving.php" class="spiff spiff-mid">
          <div class="spiff-img"><img src="<?php echo $TopDir; ?>images/spiff-hover.png" alt=""></div>
          <div class="spiff-sep"></div>
          <h1>STRESS RELIEVING</h1>
          <div class="spiff-text">
            Thermal Stress Relieving is an annealing process that heats the metal below the austenite phase to reduce distortions or changes in dimensions that might occur after shaping.
          </div>
          <div class="readmore">MORE <div class="fa fa-angle-double-right"></div></div>
        </a>

        <a href="<?php echo $TopDir; ?>oxy-fuel-cutting.php" class="spiff spiff-mid2">
          <div class="spiff-img"><img src="<?php echo $TopDir; ?>images/spiff-hover.png" alt=""></div>
          <div class="spiff-sep"></div>
          <h1>OXY-FUEL CUTTING</h1>
          <div class="spiff-text">
            Oxy-Fuel Cutting will produce products that range from simple rectangles, circles, and rings, to intricate shapes custom-cut to specification.
          </div>
          <div class="readmore">MORE <div class="fa fa-angle-double-right"></div></div>
        </a>

        <a href="<?php echo $TopDir; ?>steel-shot-blasting.php" class="spiff spiff-right">
          <div class="spiff-img"><img src="<?php echo $TopDir; ?>images/spiff-hover.png" alt=""></div>
          <div class="spiff-sep"></div>
          <h1>SHOT BLASTING</h1>
          <div class="spiff-text">
            Shot Blasting is the operation of cleaning or preparing a surface by forcibly propelling a stream of abrasive material against it under high pressure.
          </div>
          <div class="readmore">MORE <div class="fa fa-angle-double-right"></div></div>
        </a>

        <div style="clear: both;"></div>
      </article>
    </div>
    <?php } ?>

    <?php if (!empty($Map)) { ?>
    <div id="map-canvas"></div>
    <?php } ?>
    
    <?php if (empty($Inventory)) { ?>
    <div id="inventory">
      <article>
        <div>
          We carry and sell multiple types of steel in a wide variety of sizes.<br>
          <em>Ask about our inventory today!</em>
        </div>
      </article>
    </div>
    <?php } ?>

    <article id="callus">
      CALL US: <span>800-943-9511</span>
    </article>

    <div id="footer1">
      <footer>
        <div id="location">
          <img src="<?php echo $TopDir; ?>images/logo-footer.png?<?php echo filemtime('images/logo-footer.png'); ?>" alt="" id="logo-footer"><br>
          <div id="loc-left">
            <strong>Sullivan Precision Plate</strong><br>
            460 Cardinal Lane<br>
            Hartland, Wisconsin 53029
          </div>
          
          <div id="loc-right">
            <strong style="color: #72A536;">P:</strong> (262) 369-7200<br>
            <strong style="color: #72A536;">F:</strong> (262) 369-7219<br>
            <strong style="color: #72A536;">E:</strong> <?php email("sales@sullivanplate.com"); ?>
          </div>

          <div style="clear: both;"></div>
        </div>

        <div id="footer-menu">
          <?php include "menu.php"; ?>
        </div>

        <div style="clear: both;"></div>
      </footer>
    </div>
    
    <div id="footer2">
      <footer>
        <div id="emailsignup">
          <!-- Begin MailChimp Signup Form -->
          <form action="//thesullivancorp.us12.list-manage.com/subscribe/post?u=25444b22e39cf774ae7efe4ea&amp;id=ca643ad173" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div>
              <div style="position: absolute; left: -5000px;"><input type="text" name="b_25444b22e39cf774ae7efe4ea_ca643ad173" tabindex="-1" value=""></div>
              <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="EMAIL SIGN UP">
              <input type="submit" value="SUBMIT" name="subscribe" id="mc-embedded-subscribe" class="button">
              <div id="mce-responses" class="clear">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
              </div>
            </div>
          </form>
          <!--End mc_embed_signup-->
        </div>

        <div id="copyright">
          &copy; <?php echo date("Y"); ?> All rights reserved, Sullivan Precision Plate. Site by <a href="http://www.foresitegrp.com">Foresite Group</a>
        </div>

        <div style="clear: both;"></div>
      </footer>
    </div>
    
  </body>
</html>