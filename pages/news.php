<?php
/**
* The template for displaying all pages.
*
* Template Name: News
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
		// Latest news
		get_template_part( 'template-parts/content', 'latestnews' );
		// Case studies
		get_template_part( 'template-parts/content', 'casestudy' );
		// Approach
		get_template_part( 'template-parts/content', 'approach' );
		// Newsletter
		get_template_part( 'template-parts/content', 'newsletter' );
		// Contact
		get_template_part( 'template-parts/content', 'contact' );

		get_template_part( 'template-parts/content', 'social' );

		get_template_part( 'template-parts/content', 'map' );


	?>
	</main><!-- #main -->
	</div><!-- #primary -->
	<?php
	get_footer();
