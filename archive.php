<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Northern_Media
 */

get_header(); ?>

	<?php
		// Service nav
		get_template_part( 'template-parts/content', 'servicenav' );
		// Slider
		get_template_part( 'template-parts/content', 'slider' );
		// Latest news
		get_template_part( 'template-parts/content', 'archive-news' );
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

<?php
get_footer();
