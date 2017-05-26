<section id="employee-news">
    <div class="container">
        <div class="center"><h2 class="section-title">Employee News</h2></div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi.</p>

        <div class="row">
        
        <?php echo do_shortcode('[ajax_load_more container_type="div" post_type="post" posts_per_page="3" category="employee-news" scroll="false" button_label="Load More"]') ?>
        
        </div>

    </div>
</section>
