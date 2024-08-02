<?php
$PageTitle = "Gallery";
$Banner = "";
$BannerText = "Gallery";
$Description = "This is the image gallery for Sullivan Precision Plate. Here you'll find images of our grinders, flame cutters and more. Take a look! ";
include "header.php";
?>

<h2>Gallery</h2>

<div class="gallery">
  <?php
  $count = 1;
  $images = glob("images/gallery/*.webp");
  foreach($images as $image) {
    echo '<a href="'.$image.'" data-fancybox="gallery" style="background: url('.$image.');" aria-label="Gallery '.$count.'"></a>'."\n";
    $count++;
  }
  ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">
<script>
  Fancybox.bind('[data-fancybox]', { closeButton: true, Toolbar: { enabled: false } });
</script>

<?php include "footer.php"; ?>