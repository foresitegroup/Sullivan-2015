<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

$TopDir = ($_SERVER['DOCUMENT_ROOT'] != dirname(__FILE__)) ? "http://" . $_SERVER['SERVER_NAME'] . "/" : "";
if ($_SERVER['SERVER_NAME'] == "localhost") { $parts = explode("/", $_SERVER['REQUEST_URI']); $TopDir .= $parts[1] . "/"; }

include "../footer.php";
?>