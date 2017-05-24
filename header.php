<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Northern_Media
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>




<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

<?php if (is_front_page()) {

	//get_template_part( 'template-parts/content', 'header' );
	get_template_part( 'template-parts/content', 'responsive-nav' );

 } else {
	get_template_part( 'template-parts/content', 'headersub' );
	get_template_part( 'template-parts/content', 'responsive-nav' );
 }
 ?>

	<div id="content" class="site-content">
