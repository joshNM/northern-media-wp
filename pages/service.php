<?php
/**
* The template for displaying all pages.
*
* Template Name: Service
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Northern_Media
*/
get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php
		// Get slug for PAGE
		global $post;
		$slug = get_post( $post )->post_name;

		// Service nav
		get_template_part( 'template-parts/content', 'servicenav' );
		// Case Study
		get_template_part( 'template-parts/content', 'slider' );
	?>
<span id="newSlug" style="display: none;"><?php echo $slug ?></span>


	<section id="service-intro">
		<div class="container" style="overflow: hidden;">
			<h2 class="section-title"><?php the_title(); ?></h2>
			<?php the_content(); ?>
			<?php

				$projectsArgs = array(
				'post_type' => 'project',
				'taxonomy'=>'category',
				'term' => $slug,
				);

				$projects = new WP_Query( $projectsArgs ); ?>

					<!-- <li><input type="checkbox" value="None" id="slideOne" name="check" /> All</li> -->
				<?php
					if ($projects->have_posts()) {
						// filterProjects($slug);
					}

					if ( $projects->have_posts() ) :

				?>



			<!-- Swiper -->
			<div class="swiper-container" id="recent-projects" style="position: relative; overflow: visible !important;">
				<div class="swiper-wrapper" style="padding: 0px 0px;">


			      <?php

			      while ( $projects->have_posts() ) : $projects->the_post();

			      $svg = get_field('category_image', 'category_'. the_category_ID( $echo ) .'');

			      $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

			      $cats = get_the_category();

			      ?>


					<div class="swiper-slide">
						<div class="inner-project">
							<div class="project-image">
								<img src="<?php echo $feat_image; ?>">
							</div>
							<div class="project-info">
								<a href="<?php the_permalink(); ?>" style="color: #333;"><h4 style="color: black"><?php the_title(); ?></h4></a>
								<?php
								echo get_simple_likes_button( get_the_ID() );
									for ($i=0; $i < count($cats) ; $i++) {
										if (count($cats) == 1) {
											echo '<img class="svg" style="height: 50px; width: 50px;" src="'.$svg['url'].'">';
											echo '<span style="position: absolute; bottom: 20px; color: black;">' . $cats[$i]->name . ' / </span>';
										} else {
											echo '<span>' . $cats[$i]->name . ' / </span>';
										}

									}
								 ?>


								<a href="<?php the_permalink(); ?>" style="color: black;"><i style="color: black;" class="fa fa-plus"></i></a>
							</div>
							<i class="fa fa-share-alt"></i>
		          <?php echo crunch(); ?>
						</div>
					</div>


				<?php endwhile; ?>
		        <?php wp_reset_postdata(); ?>
					</div>
					<i class="fa fa-chevron-right" id="service" aria-hidden="true" style="z-index: 10000000000;"></i>
					<i class="fa fa-chevron-left" id="service" aria-hidden="true" style="z-index: 10000000000;"></i>
				</div>
						<!-- Add Arrows -->


		        <?php else : ?>

		        <?php endif; ?>

		</div>
	</section>

	<?php

		get_template_part( 'template-parts/content', 'servicetestimonial' );
		get_template_part( 'template-parts/content', 'latestnews' );
		get_template_part( 'template-parts/content', 'team' );
		// get_template_part( 'template-parts/content', 'team' );
		get_template_part( 'template-parts/content', 'faqs' );
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
