<section id="services-nav" style="margin-bottom: 0px">
  <div class="container-fluid">
    <ul id="services" style="margin-bottom: 0;">
      
      
      <?php
      $servicesArgs = array(
      'post_parent' =>  11,
      'post_type' => 'page',
      'order' => 'asc'
      );
      
      $services = new WP_Query( $servicesArgs ); ?>
      <?php if ( $services->have_posts() ) : ?>
      <!-- the loop -->
      <?php while ( $services->have_posts() ) : $services->the_post(); ?>
      <?php $svg = get_field('category_image', 'category_'. the_category_ID( $echo ) .'');
        static $delay = 0;
      ?>

      <li class="service-icon " data-wow-delay="<?php echo $delay . 's' ?>">
        <div>
        <a href="<?php the_permalink(); ?>">
          <img src="<?php echo $svg['url']; ?>" style="width: 80px; height: 80px;" alt=""/>
          </a>
        </div>

        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>


        <div class="hover-service">
          <div>
            <a href="<?php the_permalink() ?>">
            <img src="<?php echo $svg['url']; ?>" style="width: 80px; height: 80px;" alt=""/>
            </a>
          </div>
          <a href="<?php the_permalink() ?>">
          <p><?php the_title(); ?><p>
          </p>
            <p>
            <?php echo wp_trim_words( get_the_content(), 30, '...' ); ?>
            </p>
            <div class="read-more">
              <a href="<?php the_permalink(); ?>" style="color: white;">Read More</a>
            </div>
          </div>
          
        </li>

        <?php $delay = $delay + 0.2; ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
      </ul>
    </div>
  </section>
  <!-- end services-nav -->