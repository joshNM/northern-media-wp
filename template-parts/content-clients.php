<section id="clients">
  <div class="container">
    <h2 class="section-title">Our Clients</h2>

    <div class="swiper-container-client">
        <div class="swiper-wrapper">
      <?php
        $clientArgs = array(
        'post_type' => 'client',
        );

        $client = new WP_Query( $clientArgs ); ?>
        <?php if ( $client->have_posts() ) :

        while ( $client->have_posts() ) : $client->the_post();
      ?>

            <div class="swiper-slide">
              <img style="max-width: 100%;" src="<?php the_field('client_logo_black_&_white') ?>"/>
            </div>

      <?php endwhile; endif; ?>
        </div>
        <!-- Add Pagination -->
       
    </div>

  </div>
</section>
<!-- end clients -->
