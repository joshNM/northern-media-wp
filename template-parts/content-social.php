<section id="social-hub">
  <div class="container">
    <h2 class="section-title">Social Hub</h2>
  
      <?php the_field('social_media_text', 'option'); ?>
    
    <div class="row">
      <div class="col-md-4" id="facebook">
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId=1892076741010425";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-page" data-href="https://www.facebook.com/northernmedia/" data-tabs="timeline" data-height="400" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/northernmedia/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/northernmedia/">Northern Media</a></blockquote></div>
        <br><br>
        <center><a href="<?php the_field('facebook_url', 'option'); ?>"><button type="button" name="button" class="button">Like Us</button></a></center>
      </div>
      <div class="col-md-4" id="twitter">
        <a class="twitter-timeline" data-height="400" data-theme="light" href="https://twitter.com/northernmediaNM">Tweets by northernmediaNM</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        <br><br>
        <center><a href="<?php the_field('twitter_url', 'option'); ?>"><button type="button" name="button" class="button">Follow Us</button></a></center>
      </div>
      <div class="col-md-4" id="behance">
      <?php echo do_shortcode('[edsbportman layout_type="single_cat" id="1" featured="n" mosaic_style="one" tile_margin="20" sct="n" scd="n" sci="n" order_by="id" ordering="asc" ]'); ?>
      <br>
        <center><a href="<?php the_field('behance_url', 'option'); ?>"><button type="button" name="button" class="button">Follow Us</button></a></center>
      </div>
    </div>
  </div>
</section>
<!-- end social-hub -->