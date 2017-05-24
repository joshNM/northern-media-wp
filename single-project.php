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

	
		<img src="<?php the_field('banner_image'); ?>" style="max-width: 100%; height: auto;">

		<section class="project-content" style="background: #f6f6f6; padding: 20px 0px 40px 0px;">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<h1><?php the_title(); ?></h1>
						<?php the_field('content'); ?>

						<?php 

						$svg = get_field('category_image', 'category_'. the_category_ID( $echo ) .'');

						$cats = get_the_category();

						?>

					</div>
					<div class="col-sm-4">
						<div class="card">
							<div class="card__img">
								<img src="<?php the_field('client_logo') ?>">
							</div>
							<div class="card__content">
								<ul>
									<li>Client: <span><?php the_field('client') ?></span></li>
									<li>Project: <span><?php the_field('work_done') ?></span></li>
									<li>Services: <span></span></li>
									<li>
									<?php
										foreach ($cats as $cat) {
										    $catID = $cat->term_id;
										    $svg = get_field('category_image', 'category_'. $catID .'');

										    echo '<img class="svg" style="height: 50px; width: 50px;" src="'.$svg['url'].'">';

										}
									 ?>
									</li>
								</ul>
							</div>
						</div>
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
