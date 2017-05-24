<?php
/**
* The template for displaying all pages.
*
* Template Name: Home
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Northern_Media
*/
get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	<section id="landing">
		<div id="loader-wrapper">
			<div id="loader"></div>
			<div class="loader-section section-left"></div>
			<div class="loader-section section-right"></div>
		</div>
		<!-- Static navbar -->
		<section id="head-wrapper">
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container-fluid">
				
					<img style="max-width: 100%;" src="<?php echo get_stylesheet_directory_uri(); ?>/images/secondarylogo.c7dacc97.png">			
				<?php
					$headerHome = array(
					'menu_class' => 'nav navbar-nav animsition',
					'theme_location' => 'primary',
					'depth' => 1
					);
				?>
					<?php echo wp_nav_menu ( $headerHome ) ?>
					<!-- <div style="clear: both;"></div> -->
				</div>
			</nav>
			</section>

		</section>
		<!-- end landing -->

			<section id="menu-burger">
				<button class="hamburger hamburger--elastic" type="button">
				  <span class="hamburger-box">
				    <span class="hamburger-inner"></span>
				  </span>
				</button>
			</section>

				


			<?php
				// Service nav
				get_template_part( 'template-parts/content', 'home-slider' );
				get_template_part( 'template-parts/content', 'servicenav' );
			?>

			<section id="our-agency">
				<div class="container">
					<h2 class="section-title">Our Agency</h2>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; else : ?>
						<p><?php _e( 'Sorry, no content is here just yet...' ); ?></p>
					<?php endif; ?>
					<button type="button" name="button" class="button" style="color: #9d9d9c; border: 1px solid #9d9d9c;"><a href="<?php the_permalink(9) ?>">More About Us</a></button>
				</div>
			</section>
			<!-- end our-agency -->
			<?php
				// Clients slider
				get_template_part( 'template-parts/content', 'clients' );
				// Team
				get_template_part( 'template-parts/content', 'team' );
				// Recent projects
				get_template_part( 'template-parts/content', 'recentprojects' );
				// Case studies
				get_template_part( 'template-parts/content', 'casestudy' );
				// Approach
				get_template_part( 'template-parts/content', 'approach' );
				// Latest news
				get_template_part( 'template-parts/content', 'latestnews' );
				// Newsletter
				get_template_part( 'template-parts/content', 'newsletter' );
				// Contact
				get_template_part( 'template-parts/content', 'contact' );
				// Social
				get_template_part( 'template-parts/content', 'social' );

				get_template_part( 'template-parts/content', 'map' );
			?>
			</main><!-- #main -->
			</div><!-- #primary -->
			<?php
			get_footer();
