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
		// get_template_part( 'template-parts/content', 'servicenav' );
		// Case studies
		// get_template_part( 'template-parts/content', 'casestudy' );
	?>
	<section id="case-studies">
		<div class="container">
			<h2 class="section-title"><?php the_title(); ?></h2>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>



		<div class="row">
			<div id="studies-container" style="overflow: hidden;">

			<?php
			filterCases();
			 ?>

			    <div class="swiper-container-projects">
			        <div class="swiper-wrapper">

			    <?php

			      $projectsArgs = array(
			      'post_type' => 'project',
			      );

			      $projects = new WP_Query( $projectsArgs ); ?>
			      <?php if ( $projects->have_posts() ) :

			      while ( $projects->have_posts() ) : $projects->the_post();

			      $svg = get_field('category_image', 'category_'. the_category_ID( $echo ) .'');

			      $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

			      $cats = get_the_category();

			    ?>

			            <div class="swiper-slide">
							<div class="inner-project">
								<div class="project-image" style="height: 250px; background: url(<?php echo $feat_image; ?>); background-repeat: no-repeat; background-size: contain; background-position: center center;">

								</div>
								<div class="project-info">
									<h4><a href="<?php the_permalink(); ?>" style="color: inherit;"><?php the_title(); ?></a></h4>
								<p style="margin-bottom: 0">
								<?php
									for ($i=0; $i < count($cats) ; $i++) {
										if (count($cats) == 1) {
											echo '<img class="svg" style="height: 50px; width: 50px;" src="'.$svg['url'].'">';
											echo '<span style="position: absolute; bottom: 20px;">' . $cats[$i]->name . ' / </span>';
										} else {
											echo '<span>' . $cats[$i]->name . ' / </span>';
										}

									}
								 ?>
								 </p>
									<?php //echo get_simple_likes_button( get_the_ID() ); ?>

								</div>
								<?php echo crunch(); ?>
								<!-- <i class="fa fa-share-alt" style="color: black; position: absolute; top: 20px; right: 15px;"></i> -->
							</div>
			            </div>


				<?php endwhile; ?>
		        <?php wp_reset_postdata(); ?>
		        <?php else : ?>
		        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		        <?php endif; ?>

			        </div>
			        <!-- Add Pagination -->
    			</div>
    						        <div class="swiper-pagination"></div>
			</div>
		</div>
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
