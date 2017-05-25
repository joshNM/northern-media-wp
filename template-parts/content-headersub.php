    <section id="menu-burger-small">
<?php $home = get_home_url(); ?>
      <h2 class="pull-left" style="color: white; margin-top: 13px; margin-left: 10px;"><a style="color: white;" href="<?php echo $home; ?>">Northern Media</a></h2>

      <button class="hamburger hamburger--elastic pull-right" type="button">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>

        <div style="clear: both;"></div>

      </section>

<section id="small-nav">
  <div class="container">
    <ul class="nav navbar-nav">
      <li class="logo wow fadeInDown">
      <a href="<?php echo home_url(); ?>">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/secondarylogo.c7dacc97.png">
      </a>
      </li>

        <?php
          $headerSub = array(
            'menu_class' => 'nav navbar-nav',
            'theme_location' => 'primary',
            'depth' => 1
          );
        ?>

        <?php echo wp_nav_menu ( $headerSub ) ?>
      
      <li><a href="mailto:<?php the_field('email_address', 'option') ?>"><i class="fa fa-envelope-o"></i></a></li>
      <li><a href="tel:<?php the_field('telephone_number', 'option') ?>"><i class="fa fa-phone"></i></a></li>
      <li><a href="<?php the_field('facebook_url', 'option'); ?>"><i class="fa fa-facebook"></i></a></li>
      <li><a href="<?php the_field('twitter_url', 'option'); ?>"><i class="fa fa-twitter"></i></a></li>
      <li><a href="<?php the_field('linkedin_url', 'option'); ?>"><i class="fa fa-linkedin"></i></a></li>
      <li><a href="<?php the_field('behance_url', 'option'); ?>"><i class="fa fa-behance"></i></a></li>



    </ul>
  </div>
</section>
<!-- <div style="height: 100px;"></div> -->