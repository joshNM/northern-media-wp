<?php
/**
* The template for displaying all pages.
*
* Template Name: Contact
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Northern_Media
*/
get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	
	<?php
		// Service nav
		get_template_part( 'template-parts/content', 'servicenav' );
	?>
	
	
	<?php
		// Contact
		get_template_part( 'template-parts/content', 'contact' );
	?>

	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2364.074149842213!2d-1.5047456837874633!3d53.6634789800468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48796702cbde30b5%3A0xcdcab2199a011c18!2sNorthern+Media!5e0!3m2!1sen!2suk!4v1492680324944" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	
	<?php
		// Newsletter
		get_template_part( 'template-parts/content', 'newsletter' );

		get_template_part( 'template-parts/content', 'social' );
	?>



	</main><!-- #main -->
	</div><!-- #primary -->
	<?php
	get_footer();