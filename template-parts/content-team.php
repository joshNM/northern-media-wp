<section id="team">
  <div class="container">
    <div>
      <h2 class="section-title">Our Talented Team</h2>
    </div>


    <?php

      $userArgs = array(
        'role' => 'Author',
      );

      // The Query
      $user_query = new WP_User_Query( $userArgs );
      $index = 0;


        foreach ( $user_query->results as $user ) : ?>
          <?php if($index < 10) : ?>

        <?php //print_r($user); ?>
        <div class="twenty">

          <div class="inner-member" style="background: url(<?php the_field('profile_photo', 'user_' . $user->id); ?>); background-size: cover;">
            <div class="member-info">
              <i class="fa fa-comment"></i>
              <h3><?php echo $user->first_name ?></h3>
              <h4><?php echo $user->position ?></h4>
              <a href="<?php echo get_author_posts_url( $user->id ) ?>" style="color: white;"><button type="button" name="button" class="button">View Profile</button></a>
            </div>
          </div>
          <div class="team-posts-wrap">
            <div class="team-posts">
              <div class="left">
                  <img src="<?php the_field('profile_photo', 'user_' . $user->id); ?>" style='border-radius: 10px; max-width: 211px; height: auto;'>
                  <div class="member-info">
                    <h3><?php echo $user->first_name ?></h3>
                    <h4 style="margin-top: 0"><?php echo $user->position ?></h4>
                    <h5 style="margin-bottom: 10px;"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $user->user_email; ?></h5>
                    <h5 style="margin-bottom: 10px;"><i class="fa fa-phone" aria-hidden="true"></i> <?php the_field('telephone', 'user_' . $user->id);?></h5>

                    <a href="<?php echo get_author_posts_url( $user->id ) ?>" style="color: white;"><button type="button" name="button" class="button">View Profile</button></a>
                  </div>

              </div>
              <div class="right">
              <i class="fa fa-times cross" aria-hidden="true" style="position: absolute; top: 0px; right: -15px; color: white"></i>
                <h4><i class="fa fa-comment" aria-hidden="true"></i> Keep up to date with <?php echo $user->first_name; ?></h4>
                <hr>
                <ul class="timeline-ul">
                <?php

                // check if the repeater field has rows of data
                if( have_rows('timeline', 'user_' . $user->id) ):

                  // loop through the rows of data
                    while ( have_rows('timeline', 'user_' . $user->id) ) : the_row();

                        // display a sub field value
                        ?> <li class="post-timeline"> <?php the_sub_field('post');?> </li>
                        <hr>

                    <?php endwhile;

                else :

                    echo '<li class="post-timeline">Sorry, there is nothing to show yet...</li>';

                endif;

                ?>
                </ul>
              </div>
            </div>
          </div>
            <!-- end team posts -->

        </div>


    <?php endif; $index++; endforeach; ?>

    ?>


    <div style="clear: both;"></div>
    <div>
      <?php if (!is_page(15)) : ?>
        <button type="button" name="button" class="button" id="team-button"><a style="color: white" href="<?php the_permalink(15) ?>">Our Full Team</a></button>
      <?php else : ?>
        <div style="margin-bottom: 20px;"></div>
      <?php endif; ?>
    </div>
  </div>
</section>
<!-- end team -->
