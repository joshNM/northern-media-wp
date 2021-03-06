<?php
/**
* The template for displaying all single posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package Northern_Media
*/
get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php get_template_part( 'template-parts/content', 'servicenav' ); ?>
		<?php get_template_part( 'template-parts/content', 'slider' ); ?>
<style type="text/css">
	.single-news-item h2, .single-news-item h3, .single-news-item h4, .single-news-item h5 {
		color: #c2d102;
	}
	.single-news-item p {
		color: #9d9d9c;
	}
</style>
		<!-- CONTENT HERE -->
		<section class="Project-page">
			<div class="container">
				<div class="Project-title"><h1 class="partial-title"><?php the_field('project_caption'); ?></h1></div>
				<div class="Project-line"></div>
				<div class="row">
					<div class="col-md-7 single-news-item">
						<?php the_field('content'); ?>
					</div>
					<div class="col-md-5">
					<?php 
					$images = get_field('project_image');
					if( $images ): ?>
					    <ul>
					        <?php foreach( $images as $image ): ?>
					            <li>
					                <a href="<?php echo $image['url']; ?>" data-lightbox="nm" data-title="<?php echo $image['title']; ?>">
					                	<i class="fa fa-search-plus" aria-hidden="true"></i>
					                     <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>" />
					                </a>
					            </li>
					        <?php endforeach; ?>
					    </ul>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</section>

		<?php 
			get_template_part( 'template-parts/content', 'newsletter' );

			get_template_part( 'template-parts/content', 'contact' );

			get_template_part( 'template-parts/content', 'social' );

		?>


	</main><!-- #main -->
	</div><!-- #primary -->
	<?php
	get_footer();
