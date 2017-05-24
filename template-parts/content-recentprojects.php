<section id="recent-projects">
  <div class="container">
    <h2 class="section-title">Recent Projects</h2>
    <div class="row">

      <?php
        $projectsArgs = array(
        'post_type' => 'project',
        'order' => 'desc',
        'posts_per_page' => 3
        );

        $projects = new WP_Query( $projectsArgs ); ?>
        <?php if ( $projects->have_posts() ) :

        while ( $projects->have_posts() ) : $projects->the_post();

        $svg = get_field('category_image', 'category_'. the_category_ID( $echo ) .'');

        $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

        $cats = get_the_category();

        ?>

      <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="inner-project">
          <div class="project-image">
            <img src="<?php echo $feat_image; ?>">
          </div>
          <div class="project-info">
            <a href="<?php the_permalink(); ?>" style="color: #333;"><h4><?php the_title(); ?></h4></a>
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

             <?php echo get_simple_likes_button( get_the_ID() ); ?>
            <a href="<?php the_permalink(); ?>"><i class="fa fa-plus"></i></a>
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

    </div>
    <button type="button" name="button" class="button"><a href="<?php the_permalink(13) ?>">View All</a></button>
  </div>
</section>
<!-- end recent-projects -->
