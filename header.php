<?php
function email($address, $name="") {
  for ($i = 0; $i < strlen($address); $i++) { $email .= (rand(0, 1) == 0) ? "&#" . ord(substr($address, $i)) . ";" : substr($address, $i, 1); }
  if ($name == "") $name = $email;
  echo "<a href=\"&#109;&#97;&#105;&#108;&#116;&#111;&#58;$email\">$name</a>";
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <title>Sullivan Corporation<?php if ($PageTitle != "") echo " | " . $PageTitle; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Foresite Group">
    
    <meta name="viewport" content="width=device-width">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="inc/main.css">
    
    <script type="text/javascript" src="inc/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="inc/bootstrap-collapse.js"></script>
    <script type="text/javascript" src="inc/jquery.cycle2.min.js"></script>
    <link rel="stylesheet" href="inc/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <script type="text/javascript" src="inc/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("a[href^='http'], a[href$='.pdf']").not("[href*='" + window.location.host + "']").attr('target','_blank');
        $(".fancybox").fancybox();
        $("#datepicker1").datepicker();
        $("#datepicker2").datepicker();
        $("#datepicker3").datepicker();
      });
    </script>
    
    <!--[if lt IE 9]>
    <script src="inc/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <link rel="stylesheet" href="inc/main-ie8.css">
    <![endif]-->
    <!--[if lt IE 7 ]>
    <script type="text/javascript" src="inc/dd_belatedpng.js"></script>
    <script type="text/javascript">DD_belatedPNG.fix('img, .png');</script>
    <![endif]-->
  </head>
  <body<?php if ($PageTitle == "") echo " style=\"background: url(images/background.jpg)\";"; ?>>
    
    <div id="header-wrap">
      <header>
        <a href="."><img src="images/logo.png" alt="KM Tooling" id="logo"></a>

        <div id="topmenu">
          <span class="phone"><i class="fa fa-phone"></i> 800-943-9511</span> <a href="rfq.php">RFQ</a> | <a href="contact.php">SALES ENGINEER</a> | <a href="contact.php">CONTACT</a>
        </div>

        <form class="search" method="POST" action="search.php">
          <div>
            <input type="text" name="search" placeholder="SEARCH"><button type="submit"><i class="fa fa-search"></i></button>
          </div>
        </form>
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
          The Sullivan Corporation has been serving the grinding industry for over 45 years.<br>
          <br>
          <a href="grinding.php">READ MORE</a>
        </div>
      </div>
      <div style="background: url(images/home-banner-request.jpg) top center no-repeat;">
        <div>
          <h1>REQUEST A QUOTE</h1>
          With insight and engineering talent, our sales engineers are available to provide quotations, product availability and technical assistance for your project.<br>
          <br>
          <a href="contact.php">READ MORE</a>
        </div>
      </div>
    </div>
    <?php } else { ?>
    <div id="sub-banner"<?php if ($Banner != "") echo " style=\"background-image: url(images/" . $Banner . ");\""; ?>>
      <div>
        <?php echo $BannerText; ?>
      </div>
    </div>
    <?php } ?>
    <?php if ($ServicesMenu != "") { ?>
    <div id="services-menu">
      <?php include "menu.php"; ?>
    </div>
    <?php } ?>

    <article<?php if ($FullWidth != "") echo " id=\"fullwidth\""; ?>>
