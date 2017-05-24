<?php
/**
* The template for displaying all pages.
*
* Template Name: Approach
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
	<?php $svg = get_field('category_image', 'category_'. the_category_ID( $echo ) .'');
	$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	?>
	

	<section id="approach-jumbo" style="background: url(<?php echo $feat_image; ?>); background-size: cover;">
		<div class="container">
			<h1 class="wow fadeInDown">Our approach to...</h1>
			<h2 class="wow fadeInDown"><?php the_title(); ?></h2>
			<div class="wow fadeInDown">
				<img src="<?php echo $svg['url']; ?>" style="width: 80px; height: 80px;" alt="" class="svg" />
			</div>
		</div>
	</section>
	<section id="design-approach" class="inner-approach">
		<div class="container">
		<?php the_content(); ?>
		</div>
	</div>
</section>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<!-- end approch -->
<?php
	// Newsletter
	get_template_part( 'template-parts/content', 'newsletter' );
	// Contact
	get_template_part( 'template-parts/content', 'contact' );

?>
</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();