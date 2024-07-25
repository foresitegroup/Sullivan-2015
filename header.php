<?php
if (!isset($TopDir)) $TopDir = "";

function email($address, $name="") {
  $email = "";
  for ($i = 0; $i < strlen($address); $i++) { $email .= (rand(0, 1) == 0) ? "&#" . ord(substr($address, $i)) . ";" : substr($address, $i, 1); }
  if ($name == "") $name = $email;
  echo "<a href=\"&#109;&#97;&#105;&#108;&#116;&#111;&#58;$email\">$name</a>";
}
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Sullivan Precision Plate<?php if ($PageTitle != "") echo " | " . $PageTitle; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $TopDir; ?>images/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo $TopDir; ?>images/apple-touch-icon.png">

    <meta name="description" content="<?php echo (!empty($Description)) ? $Description : "Sullivan Precision Plate is a Metal Service Center that specializes in Steel Plate. Sullivan offers Steel Plate, Flame-Cutting, High Definition Plasma-Cutting, Thermal Stress Relieving and Shot Blasting delivered on-time, on budget, of the highest quality, and to your specifications."; ?>">

    <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,300,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $TopDir; ?>inc/main.css?<?php if ($TopDir == "") echo filemtime('inc/main.css'); ?>">

    <script type="text/javascript" src="<?php echo $TopDir; ?>inc/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?php echo $TopDir; ?>inc/bootstrap-collapse.js"></script>
    <script type="text/javascript" src="<?php echo $TopDir; ?>inc/jquery.cycle2.min.js"></script>
    <link rel="stylesheet" href="<?php echo $TopDir; ?>inc/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo $TopDir; ?>inc/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $(".fancybox").fancybox();
        $("#datepicker1").datepicker();
        $("#datepicker2").datepicker();
        $("#datepicker3").datepicker();
      });
    </script>

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
  <body<?php if ($PageTitle == "") echo " style=\"background: url(images/background.webp)\";"; ?>>

    <div id="header-wrap">
      <header>
        <a href="<?php echo $TopDir; ?>." id="logo"><img src="<?php echo $TopDir; ?>images/logo.webp<?php if ($TopDir == "") echo "?".filemtime('images/logo.webp'); ?>" alt="Sullivan Precision Plate" width="800" height="331"></a>

        <div>
          <div id="topmenu">
            <a href="tel:8009439511" class="phone">800-943-9511</a>
            <a href="<?php echo $TopDir; ?>rfq.php">RFQ</a> | <a href="<?php echo $TopDir; ?>contact.php">SALES ENGINEER</a> | <a href="<?php echo $TopDir; ?>contact.php">CONTACT</a>
          </div>

          <form class="search" method="POST" action="<?php echo $TopDir; ?>search.php">
            <div>
              <input type="text" name="search" placeholder="SEARCH" aria-label="Search">
              <button type="submit" aria-label="Submit search"></button>
            </div>
          </form>
        </div>
      </header>
    </div>

    <a id="menu-toggle" data-toggle="collapse" data-target="#menu" class="fa fa-bars"></a>

    <nav id="menu" class="collapse">
      <?php include "menu.php"; ?>
    </nav>

    <?php if ($PageTitle == "") { ?>
    <div class="cycle-slideshow" data-cycle-slides="> div" data-cycle-timeout="8000">
      <p class="cycle-pager"></p>
      <div style="background: url(images/home-banner3.jpg) top center no-repeat;">
        <div>
          <h1>OVER 300 YEARS</h1>
          Of combined operator experience. All orders are processed by our team of skilled craftsmen.<br>
          <br>
          <a href="services.php">READ MORE</a>
        </div>
      </div>
      <div style="background: url(images/home-banner1.jpg) top center no-repeat;">
        <div>
          <h1>LARGEST GRINDING CAPABILITIES IN THE MIDWEST</h1>
          Sullivan Precision Plate has been serving the grinding industry for over 45 years.<br>
          <br>
          <a href="grinding.php">READ MORE</a>
        </div>
      </div>
      <div style="background: url(images/home-banner-request.jpg) top center no-repeat;">
        <div>
          <h1>REQUEST A QUOTE</h1>
          With insight and engineering talent, our sales engineers are available to provide quotations, product availability and technical assistance for your project.<br>
          <br>
          <a href="rfq.php">READ MORE</a>
        </div>
      </div>
    </div>
    <?php } else { ?>
    <div id="sub-banner"<?php if ($Banner != "") echo " style=\"background-image: url(<?php echo $TopDir; ?>images/" . $Banner . ");\""; ?>>
      <div>
        <?php echo $BannerText; ?>
      </div>
    </div>
    <?php } ?>
    <?php if (!empty($ServicesMenu)) { ?>
    <div id="services-menu">
      <?php include "menu.php"; ?>
    </div>
    <?php } ?>

    <article<?php if (!empty($FullWidth)) echo " id=\"fullwidth\""; ?>>
