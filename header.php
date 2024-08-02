<?php
if (!isset($TopDir)) $TopDir = "";

function email($address, $name="") {
  $email = "";
  for ($i = 0; $i < strlen($address); $i++) { $email .= (rand(0, 1) == 0) ? "&#" . ord(substr($address, $i)) . ";" : substr($address, $i, 1); }
  if ($name == "") $name = $email;
  echo "<a href=\"&#109;&#97;&#105;&#108;&#116;&#111;&#58;$email\">$name</a>";
}

$Description = (!empty($Description)) ? $Description : "Sullivan Precision Plate is a Metal Service Center that specializes in Steel Plate. Sullivan offers Steel Plate, Flame-Cutting, High Definition Plasma-Cutting, Thermal Stress Relieving and Shot Blasting delivered on-time, on budget, of the highest quality, and to your specifications.";
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Sullivan Precision Plate<?php if ($PageTitle != "") echo " | " . $PageTitle; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $TopDir; ?>images/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo $TopDir; ?>images/apple-touch-icon.png">

    <meta name="description" content="<?php echo $Description; ?>">

    <link rel="stylesheet" href="<?php echo $TopDir; ?>inc/main.css?<?php if ($TopDir == "") echo filemtime('inc/main.css'); ?>">

    <meta property="og:title" content="Sullivan Precision Plate<?php if ($PageTitle != "") echo " | " . $PageTitle; ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://sullivanplate.com/images/logo-social.webp">
    <meta property="og:logo" content="https://sullivanplate.com/images/logo.webp">
    <meta property="og:url" content="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
    <meta property="og:description" content="<?php echo $Description; ?>">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Google tag (gtag.js) - (https://sullivanplate.com) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-942MVYNJMM"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-942MVYNJMM');
    </script>

    <!-- Google tag (gtag.js) - (http://www.thesullivancorp.com) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2TKYMFLVWH"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-2TKYMFLVWH');
    </script>
  </head>
  <body>

    <header>
      <div class="site-width">
        <a href="<?php echo $TopDir; ?>." id="logo" aria-label="Sullivan Precision Plate"></a>

        <div id="not-logo">
          <div id="topmenu">
            <a href="tel:8009439511" class="phone">800-943-9511</a>
            
            <div class="tm">
              <a href="<?php echo $TopDir; ?>rfq.php">RFQ</a> | <a href="<?php echo $TopDir; ?>contact.php">SALES ENGINEER</a> | <a href="<?php echo $TopDir; ?>contact.php">CONTACT</a>
            </div>
          </div>

          <form class="search" method="POST" action="<?php echo $TopDir; ?>search.php">
            <div>
              <input type="text" name="search" placeholder="SEARCH" aria-label="Search">
              <button type="submit" aria-label="Submit search"></button>
            </div>
          </form>
        </div> <!-- /#not-logo -->
      </div> <!-- ./site-width -->

      <input type="checkbox" id="toggle-menu" role="button">
      <label for="toggle-menu"><div></div></label>

      <nav id="menu">
        <?php include "menu.php"; ?>
      </nav>
    </header>

    <?php if ($PageTitle == "") { ?>
    <div id="hero">
      <div class="f-carousel__slide" style="background: url(images/home-banner3.webp) top center no-repeat;">
        <div class="site-width">
          <h1>Over 300 Years</h1>
          Of combined operator experience. All orders are processed by our team of skilled craftsmen.<br>
          <br>
          <a href="services.php" class="button">Read More</a>
        </div>
      </div>
      <div class="f-carousel__slide" style="background: url(images/home-banner1.webp) top center no-repeat;">
        <div class="site-width">
          <h1>Largest Grinding Capabilities In The Midwest</h1>
          Sullivan Precision Plate has been serving the grinding industry for over 45 years.<br>
          <br>
          <a href="grinding.php" class="button">Read More</a>
        </div>
      </div>
      <div class="f-carousel__slide" style="background: url(images/home-banner-request.webp) top center no-repeat;">
        <div class="site-width">
          <h1>Request A Quote</h1>
          With insight and engineering talent, our sales engineers are available to provide quotations, product availability and technical assistance for your project.<br>
          <br>
          <a href="rfq.php" class="button">Read More</a>
        </div>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.autoplay.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.autoplay.css">
    <script>
      new Carousel(document.getElementById('hero'), {
        Autoplay: { timeout: 8000, showProgress: false, transition: "crossfade" },
        Panzoom: { touch: false }, Dots: { minCount: 2 }, Navigation: false },
        { Autoplay });
    </script>
    <?php
    } else {
      echo '<div id="sub-banner"';
      if ($Banner != "") echo ' style="background-image: url('.$TopDir.'images/'.$Banner.')"';
      echo ">\n";
        echo '<h1 class="site-width">'.$BannerText."</h1>\n";
      echo "</div>\n";
    }

    if (!empty($ServicesMenu)) {
      echo '<div id="services-menu">'."\n";
        include "menu.php";
      echo "</div>\n";
    }
    ?>

    <div class="content site-width<?php if (!empty($FullWidth)) echo ' fullwidth'; ?>">