<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Northern_Media
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php get_template_part( 'template-parts/content', 'servicenav' ); ?>

	<div class="archive" style="padding: 30px 0px 0px 0px; background: #c1ce02;">
		
		<style type="text/css">
			h1, h2, h3, h4, p {
				/*color: white;*/
			}
			
			.latest-news-inner {
				background: white;
				padding: 22px;
				margin-bottom: 30px;
				-webkit-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.75);
				-moz-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.75);
				box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.75);
			}

		</style>		

		<div class="container">
			<h1 style="color: white; margin-top: 0px; text-align: center; margin-bottom: 30px;">Archive</h1>
			<?php
				if (have_posts()) :
					while (have_posts()) : the_post() ?>
			      <div class="col-xs-12 col-sm-6 col-md-6">
			        <div class="latest-news-inner">
			          <div class="content">
			            <h2 style="margin-top: 0px;"><a href="<?php the_permalink(); ?>" style="color: black; text-decoration: none;"><?php the_title(); ?></a></h4>
			            <p>
			              <?php echo wp_trim_words( get_the_content(), 50, '...' ); ?>
			            </p>
			            <span><a href="<?php the_permalink(); ?>">Read more</a></span>
			          </div>
			        </div>
			      </div>
					<?php endwhile;
				endif;

			?>
		</div>
	</div>

	<?php 
		get_template_part( 'template-parts/content', 'newsletter' );
		// Contact
		get_template_part( 'template-parts/content', 'contact' );

		get_template_part( 'template-parts/content', 'social' );

	?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
