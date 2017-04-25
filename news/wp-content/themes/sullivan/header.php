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

$TopDir = substr( home_url(), 0, strrpos( home_url(), '/')+1);

$PageTitle = "News"; // This won't display, but it's needed for formatting
$BannerText = "NEWS";
$Description = "Stay up to date on what's happening at Sullivan Precision Plate as well as what's happening in the entire Metals industry.";
$Keywords = "grinding, plate grinding, metal grinding, flame cutting, plasma cutting, stress relieving, steel shot blasting, Blanchard grinding, metal working industry, metal service center, high definition plasma cutting, Sullivan Precision Plate, Sullivan corporation, Sullivan corp, Sullivan metals, plate processing, carbon steel, stainless steel, Wisconsin manufacturing";

include "../header.php";
?>