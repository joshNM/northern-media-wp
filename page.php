<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Northern_Media
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<?php
			get_template_part( 'template-parts/content', 'servicenav' );
			get_template_part( 'template-parts/content', 'slider' );
			while ( have_posts() ) : the_post();

			?>
			<section id="our-agency">
				<div class="container">
					<h2 class="section-title"><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</div>
			</section>
			<?php

			endwhile; // End of the loop.

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
