<?php
/**
* The template for displaying all pages.
*
* Template Name: Projects
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
		// Case studies
		// get_template_part( 'template-parts/content', 'casestudy' );
	?>
	<section id="case-studies">

		<div class="container">
			<h2 class="section-title"><?php the_title(); ?></h2>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
			<div class="row">
				 <ul id="case-nav">
					<li class="branding">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/images/pngicons/1.png"> 
						<span>Branding</span>
					</li>
					<li class="web">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/images/pngicons/2.png"> 
						<span>Website</span>
					</li>
					<li class="seo">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/images/pngicons/3.png"> 
						<span>SEO</span>
					</li>
					<li class="design">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/images/pngicons/4.png"> 
						<span>Design</span>
					</li>
					<li class="social">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/images/pngicons/5.png"> 
						<span>Social</span>
					</li>
					<li class="strategy">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/images/pngicons/6.png"> 
						<span>Strategy</span>
					</li>
					<li class="pr">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/images/pngicons/7.png"> 
						<span>PR</span>
					</li>
					<li class="print">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/images/pngicons/8.png"> 
						<span>Print</span>
					</li>
					<li class="email">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/images/pngicons/9.png">
						<span>Email</span> 
					</li>
					<li class="ppc">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/images/pngicons/10.png">
						<span>PPC</span> 
					</li>
				 </ul>
			</div>
		</div>

		<div id="projects-grid">
			<?php $projectsArgs = array('post_type' => 'project'); ?>
			<?php $projects = new WP_Query( $projectsArgs ); ?>
			<?php while ( $projects->have_posts() ) : $projects->the_post(); ?>
				<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
				<?php  $svg = get_field('category_image', 'category_'. the_category_ID( $echo ) .''); ?>
				<?php $cats = get_the_category(); ?>

				<a href="<?php the_permalink(); ?>" class="C-project" style="background: url(<?php echo $feat_image; ?>)">
					<div class="overlay">
						<h2><?php the_title(); ?></h2>
					<?php
						for ($i=0; $i < count($cats) ; $i++) {
							if (count($cats) == 1) {
								echo '<div><img class="svg" style="height: 50px; width: 50px;" src="'.$svg['url'].'"></div>';
							}
						}
					 ?>
					</div>
				</a>
			<?php endwhile; ?>
			<div style="clear: both;"></div>
		</div>
</section>
	<!-- end cases -->
	<?php
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
