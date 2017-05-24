<?php
/**
* The template for displaying all pages.
*
* Template Name: About
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
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<section id="our-agency">
		<div class="container">
			<h2 class="section-title">Our Agency</h2>
			<?php the_content(); ?>
		</div>
	</section>
	<!-- end our-agency -->


	<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>

	<style type="text/css">
		.about-banner {
			display: flex;
			flex-wrap: wrap;
		}
		
		.about-banner .img {
			flex-basis: 16.6%;
		}

		.about-banner img {
			max-width: 100%;
			transition: all .2s ease-in-out;
			height: auto;
		}

		.about-banner img:hover {
			transform: scale(1.2);
			-webkit-box-shadow: 0px -5px 21px -3px rgba(0,0,0,0.19);
			-moz-box-shadow: 0px -5px 21px -3px rgba(0,0,0,0.19);
			box-shadow: 0px -5px 21px -3px rgba(0,0,0,0.19); 
		}
		
		@media(max-width: 900px) {

			.about-banner .img {
				flex-basis: 50%;
			}
		}

	</style>

	<section class="about-banner">
		<?php

		// check if the repeater field has rows of data
		if( have_rows('about_images', 'option') ):

		 	// loop through the rows of data
		    while ( have_rows('about_images', 'option') ) : the_row();
		 ?>
			<div class="img">
				<img src="<?php the_sub_field('image'); ?>" alt="">
			</div>
		 <?php
		    endwhile;
		else :
		    // no rows found
		endif;
		?>
	</section>

	<?php
		// Team
		get_template_part( 'template-parts/content', 'team' );
		// Approach
		get_template_part( 'template-parts/content', 'approach' );
		// Latest news
		get_template_part( 'template-parts/content', 'latestnews' );
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