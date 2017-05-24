<section id="contact">
  <div class="container" style="max-width: 980px;">
    <h2 class="section-title">We love to talk</h2>
    <p>
      <?php the_field('contact_info_text', 'option'); ?>
    </p>
    <div class="row">
      <div class="col-xs-12 col-sm-4 col-md-4" id="contact-information">
        <ul>
          <li><b>Telephone</b><br><span class="info"><?php the_field('telephone_number', 'option'); ?></span></li>
          <li><b>Email</b><br><span class="info"><?php the_field('email_address', 'option'); ?></span></li>
          <li class="social-list"><b>Keep up to date</b><br>

          <a href="<?php the_field('facebook_url', 'option'); ?>"><i class="fa fa-facebook"></i></a>
          <a href="<?php the_field('twitter_url', 'option'); ?>"><i class="fa fa-twitter"></i></a>
          <a href="<?php the_field('linkedin_url', 'option'); ?>"><i class="fa fa-linkedin"></i></a>
          <a href="<?php the_field('behance_url', 'option'); ?>"><i class="fa fa-behance"></i></a>
          </li>

          <li><b>Find us</b><br><span class="info">Northern Media (Yorkshire) Ltd <br>
            Unit 2, Calder Island<br> Wakefield, West Yorkshire<br> WF2 7AW</span>
        </li>
      </ul>
    </div>

    <?php echo do_shortcode('[contact-form-7 id="271" title="Contact Form"]'); ?>

  </div>
</div>
</section>
<!-- end contact -->
