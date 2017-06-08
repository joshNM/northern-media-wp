<section id="employee-news">
    <div class="container">
        <div class="center"><h2 class="section-title">Employee News</h2></div>
        <p><?php the_field('employee_news_text', 'option') ?></p>

        <div class="row">
        
        <?php echo do_shortcode('[ajax_load_more container_type="div" post_type="post" posts_per_page="3" category="employee-news" scroll="false" button_label="Load More" destroy_after="6"]') ?>
        
        </div>

    </div>
</section>

