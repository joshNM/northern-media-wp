<?php
/**
* The template for displaying all pages.
*
* Template Name: Team
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
	<section id="team-jumbo">
		<ul class="team">
			<?php

			// check if the repeater field has rows of data
			if( have_rows('slider') ):

			 	// loop through the rows of data
			    while ( have_rows('slider') ) : the_row(); ?>
					<li>
						<div class="team-slide" style="position: relative;">
							<img style="width: 100%; height: auto;" src="<?php the_sub_field('image') ?>">
							<div class="slide-caption container">
								<p><?php the_sub_field('caption') ?></p>
							</div>
						</div>
					</li>
			    <?php endwhile;

			else :

			    // no rows found

			endif;

			?>

			
			
		</ul>
	</section>
	
	<?php
		// Approach
		get_template_part( 'template-parts/content', 'team' );
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