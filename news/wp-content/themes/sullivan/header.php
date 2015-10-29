<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

$TopDir = ($_SERVER['DOCUMENT_ROOT'] != dirname(__FILE__)) ? "http://" . $_SERVER['SERVER_NAME'] . "/" : "";
if ($_SERVER['SERVER_NAME'] == "localhost") { $parts = explode("/", $_SERVER['REQUEST_URI']); $TopDir .= $parts[1] . "/"; }

$PageTitle = "News"; // This won't display, but it's needed for formatting
$BannerText = "NEWS";

include "../header.php";
?>