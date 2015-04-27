<?php
$PageTitle = ($_POST['search'] != "") ? "Search Results for \"" . $_POST['search'] . "\"" : "Search";
$BannerText = strtoupper($PageTitle);
$PlaceHolder = ($_POST['search'] != "") ? "SEARCH AGAIN" : "SEARCH";
include "header.php";
?>

<h3><?php echo $BannerText; ?></h3>

<?php
if ($_POST['search'] != "") {
  $dir = opendir(".");
  while (false != ($file = readdir($dir))) {
    if ((substr(strrchr($file, "."), 1) == "php") && ($file != "header.php") && ($file != "footer.php") && ($file != "search.php") && ($file != "menu.php")) {
      $files[] = $file;
    }
  }
  closedir($dir);
  natcasesort($files);
  
  foreach ($files as $file) {
    $contents = file_get_contents($file);
    
    if (preg_match("/" . $_POST['search'] . "/i", $contents, $oresult)) {
      // Found something.  Flip the "no results" switch.
      $sresults = "yes";
      
      // Extract the page title
      preg_match("/PageTitle = \"(.*?)\"/", $contents, $matches);
      
      // Set variable to display page title or file name if no title
      $stitle = ($matches[1] != "") ? $matches[1] : $file;
      
      // Display the results
      echo "<a href=\"$file\">$stitle</a><br>\n";
      
      // Get position of search term to create a result snippet
      $pos = stripos(trim(strip_tags($contents)), $_POST['search']);
      $start = ($pos-20 < 0) ? 0 : $pos-20;
      
      // Build the snippet
      if ($start > 0) echo "...";
      $snippet = substr(trim(strip_tags($contents)), $start, 140) . "...<br><br>\n";
      
      // Bold the search term in the snippet and display it
      echo preg_replace("/" . $_POST['search'] . "/i", "<strong>" . $oresult[0] . "</strong>", $snippet);
    }
  }
  
  // If nothing is found, man up and apologize.
  if ($sresults != "yes") {
    echo "<div style=\"text-align: center; font-weight: bold;\">Sorry, no results for \"" . $_POST['search'] . "\".</div>\n";
  } else {
    echo "<br>\n";
  }
}
?>

<form class="search searchpage" method="POST" action="search.php">
  <div>
    <input type="text" name="search" placeholder="<?php echo $PlaceHolder; ?>"><button type="submit"><i class="fa fa-search"></i></button>
  </div>
</form>

<?php include "footer.php"; ?>