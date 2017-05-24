<?php  
  if (is_page(11)) : ?>

<section id="approach">
  <div class="container">
    <div>
      <h2 class="section-title" style="margin-bottom: 0;">
        <?php if (is_page(11)) {
          echo 'Our Services';
        }
        ?>

      </h2>
    </div>

    <?php

    // If service landing
    if (is_page(11)) {
       $args = array(
      'post_parent' =>  11,
      'post_type' => 'page',
      'order' => 'asc'
       );
    } else {
       $args = array(
      'post_parent' =>  17,
      'post_type' => 'page',
      'order' => 'asc'
       );
    }



    $landing = new WP_Query( $args ); ?>
    <?php if ( $landing->have_posts() ) : ?>
    <!-- the loop -->
    <?php while ( $landing->have_posts() ) : $landing->the_post(); ?>
    <?php $svg = get_field('category_image', 'category_'. the_category_ID( $echo ) .'');?>


    <div class="twenty" id="approach">
      <div class="inner-approach">
        <img src="<?php echo $svg['url']; ?>" style="width: 80px; height: 80px;" alt=""/>
        <h3><a style="color: inherit;" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <p><?php echo substr(get_the_excerpt(), 0,140) . '...'; ?></p>
        <div class="read-more-approach">
          <p>
            <a href="<?php the_permalink(); ?>" style="color: white;">Read More</a>
          </p>
        </div>
      </div>
    </div>

    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
    <?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>


  </div>
</section>
<!-- end approach -->
<?php endif; ?>