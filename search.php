<?php
$PageTitle = ($_POST['search'] != "") ? "Search Results for \"" . $_POST['search'] . "\"" : "Search";
$Banner = "";
$BannerText = strtoupper($PageTitle);
$PlaceHolder = ($_POST['search'] != "") ? "SEARCH AGAIN" : "SEARCH";
include "header.php";
?>

<h2><?php echo $BannerText; ?></h2>

<?php
if ($_POST['search'] != "") {
  $excluded = array("search.php", "header.php", "footer.php", "menu.php", "404.php");
  $files = [];

  $dir = opendir(".");
  while (false != ($file = readdir($dir))) {
    if (substr(strrchr($file, "."), 1) == "php") {
      if (!in_array($file, $excluded)) $files[] = $file;
    }
  }
  closedir($dir);
  
  // Remove any files starting with "form-"
  $files = preg_grep('~form-~i', $files, PREG_GREP_INVERT);

  natcasesort($files);
  
  $sresults = "no";

  foreach ($files as $file) {
    $contents = file_get_contents($file);
    
    if (preg_match("/" . $_POST['search'] . "/i", $contents, $oresult)) {
      // Found something.  Flip the "no results" switch.
      $sresults = "yes";
      
      // Extract the page title
      preg_match("/PageTitle = \"(.*?)\"/", $contents, $matches);
      
      // Set variable to display page title or file name if no title
      $stitle = ($matches[1] != "") ? $matches[1] : $file;
      if ($stitle == "index.php") $stitle = "Home";
      
      // Display the results
      echo "<a href=\"$file\"><h3>$stitle</h3></a>\n";
      
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
    echo "<h3>Sorry, no results for \"" . $_POST['search'] . "\".</h3><br>\n";
  } else {
    echo "<br>\n";
  }
}
?>

<form class="search searchpage" method="POST" action="search.php">
  <div>
    <input type="text" name="search" placeholder="<?php echo $PlaceHolder; ?>" aria-label="Search">
    <button type="submit" aria-label="Submit search"></button>
  </div>
</form>

<?php include "footer.php"; ?>