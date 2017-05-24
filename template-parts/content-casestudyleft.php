<section id="testimonials">
  <ul class="testimonials-slider">

    <?php
      $caseArgs = array(
          'post_type' => 'case_study',
          'order' => 'asc',
          'posts_per_page' => -1,
          'meta_key' => 'feature',
          'meta_value' => true
       );

       $study = new WP_Query( $caseArgs ); ?>
       <?php if ( $study->have_posts() ) :

        while ( $study->have_posts() ) : $study->the_post();
     ?>

    <li>
      <div class="testimonial" style="background: url(<?php the_field('large_jumbotron'); ?>); background-size: cover;">
        <div class="container">
        <div class="row">
          <div class="col-md-6">
          <img src="<?php the_field('company_logo'); ?>">
          </div>
          <div class="col-md-6">
              <h3><?php the_field('introduction'); ?></h3>
            <h4><b><?php the_field('companylocation'); ?></b></h4>
          </div>
        </div>

        </div>
      </div>
    </li>

    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
    <?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>



  </ul>
</section>
<!-- end testimonial -study -->
