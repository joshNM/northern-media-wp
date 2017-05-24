<?php
/**
* The template for displaying all pages.
*
* Template Name: Testimonials
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

    // Service nav
    get_template_part( 'template-parts/content', 'casestudy' );
    ?>


    <section class="testimonials-wrapper">
      <div class="container">
        <div class="wrap-test">
        <div class="row">
          <div class="col-md-6">
            <div class="flex-left-container">
              <div class="full">
                <p>
                  <?php the_field('large_text_testimonial') ?>
                </p>
              </div>
              <div class="half first-half">
                <i class="fa fa-play-circle" aria-hidden="true"></i>
              </div>
              <div class="half">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="flex-right-container">
              <div class="half" style="background: url(<?php echo get_template_directory_uri () . '/images/section1.becea5ff.jpg' ?>); background-size: cover; background-position: center;">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
              </div>
              <div class="half" style="background: #c1d101">

                  <?php the_field('small_text_testimonial') ?>

              </div>
              <div class="half">
                <i class="fa fa-play-circle" aria-hidden="true"></i>
              </div>
              <div class="half">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
              </div>
              <div class="full">

                  <?php the_field('medium_text_testimonial') ?>
              
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>



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
