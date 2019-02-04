<?php
$PageTitle = "Gallery";
$Banner = "";
$BannerText = "GALLERY";
$Description = "";
$Keywords = "";
include "header.php";
?>

<h3>GALLERY</h3>

<!-- BEGIN Instagram Feed Wordpress plugin -->
<?php require_once('news/wp-blog-header.php'); ?>
<link rel='stylesheet' href='news/wp-content/plugins/instagram-feed/css/sb-instagram.min.css' type='text/css' media='all' />
<?php echo do_shortcode('[instagram-feed]'); ?>
<script type='text/javascript'>
  var sbiajaxurl = "news/wp-admin/admin-ajax.php";
  var sb_instagram_js_options = {"sb_instagram_at":"","font_method":"svg"};
</script>
<script type='text/javascript' src='news/wp-content/plugins/instagram-feed/js/sb-instagram.min.js'></script>
<!-- END Instagram Feed Wordpress plugin -->

<?php include "footer.php"; ?>