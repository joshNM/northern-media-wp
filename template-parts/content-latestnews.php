<section id="latest-news">
  <div class="container">
    <?php
  	  $newsIntro= array(
  		    'post_type' => 'page',
          'page_id' => 19
  			);

  			$newsIn = new WP_Query( $newsIntro ); ?>
  			<?php if ( $newsIn->have_posts() ) :

  			while ( $newsIn->have_posts() ) : $newsIn->the_post(); ?>

    <h2 class="section-title">Latest News</h2>

      <?php the_content(); ?>


  <?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php else : ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>

  <div class="row">
  <?php
	  $latestNews = array(
		    'post_type' => 'post',
		    'order' => 'asc',
			  'posts_per_page' => 3
			);

			$news = new WP_Query( $latestNews ); ?>
			<?php if ( $news->have_posts() ) :

			while ( $news->have_posts() ) : $news->the_post();
      $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		?>


      <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="latest-news-inner">
          <img src="<?php echo $feat_image; ?>" />
          <div class="content">
            <h4><a href="<?php the_permalink(); ?>" style="color: black; text-decoration: none;"><?php the_title(); ?></a></h4>
            <p>
              <?php echo wp_trim_words( get_the_content(), 20, '...' ); ?>
            </p>
            <?php echo get_simple_likes_button( get_the_ID() ); ?>
          </div>
          <i class="fa fa-share-alt"></i>
          <?php echo crunch(); ?>
        </div>
      </div>

      <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
    <?php else : ?>
      <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>

    <?php

      if (is_page(19)) {


      $args = array(
      	'type'            => 'monthly',
      	'limit'           => '',
      	'format'          => 'html',
      	'before'          => '',
      	'after'           => '',
      	'show_post_count' => false,
      	'echo'            => 1,
      	'order'           => 'DESC',
        'post_type'     => 'post'
      );
      ?>
      <h4>News Archive</h4>
      <ul id="archives">
      <?php
      wp_get_archives( $args ); ?>
    </ul>
    <?php
      }
    ?>

    </div>
    <!-- <button type="button" name="button" class="button">View More</button> -->
  </div>
</section>
<!-- end latest-news -->
