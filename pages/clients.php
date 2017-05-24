<?php
/**
* The template for displaying all pages.
*
* Template Name: Clients
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

    get_template_part( 'template-parts/content', 'casestudy' );
	 ?>

   <section id="clients-wrap">
     <div class="container">
	      <h2 class="section-title">Our Clients</h2>

        <div class="row">

          <?php

			      $clientArgs = array(
			      'post_type' => 'client',
			      );

			      $client = new WP_Query( $clientArgs ); ?>
			      <?php if ( $client->have_posts() ) :

			      while ( $client->have_posts() ) : $client->the_post();

			    ?>

            <div class="col-md-3">
              <div class="client">
                <img src="<?php the_field('client_logo_black_&_white') ?>" class="client-img" alt="Client image" />

                <div class="hidden-client">
                  <div class="row">
                    <div class="col-sm-6">
                      <img src="<?php the_field('client_logo_colour') ?>" class="client-img" alt="Client image" />

                      <?php if(get_field('case_study_link')) : ?>
                      <button type="button" name="button" class="button--blue"><a style="color: inherit;" href="<?php the_field('case_study_link') ?>">View Case Study</a></button>
                      <?php endif; ?>
                    </div>
                    <div class="col-sm-6 content-client">
                      <ul>
                        <?php $cats = get_the_category();?>
                        <?php    ?>
                        <?php
                        for ($i=0; $i < count($cats) ; $i++) {
                            $svg = get_field('category_image', 'category_'. $cats[$i]->term_id .''); ?>
                            <li><img class="svg" style="height: 50px; width: 50px;" src="<?php echo $svg['url']; ?>"></li>
                        <?php } ?>
                      </ul>
                      <p>
                        <?php echo wp_trim_words( get_the_content(), 20, '...' ); ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <?php endwhile; endif; ?>


        </div>

     </div>
   </section>


	<?php
		// Approach
		get_template_part( 'template-parts/content', 'approach' );
		// Latest news
		get_template_part( 'template-parts/content', 'latestnews' );
		// Newsletter
		get_template_part( 'template-parts/content', 'newsletter' );
		// Contact
		get_template_part( 'template-parts/content', 'contact' );
	?>
	</main><!-- #main -->
	</div><!-- #primary -->


	<?php
	get_footer();
