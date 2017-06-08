<section id="home-slider">
    <!-- Swiper -->
    <div class="swiper-container-home" style="position: relative;">
        <div class="swiper-wrapper" style="position: relative;">
            <?php  
                $testimonialArgs = [
                    'post_type' => 'testimonial',
                    'posts_per_page' => 6
                ];
                $testimonials = new WP_Query($testimonialArgs);
            ?>
            <?php while($testimonials->have_posts()) : $testimonials->the_post(); ?>
            <div class="swiper-slide testimonial-slide" style="background: url(<?php the_post_thumbnail_url(); ?>)">  
                <div style="position: relative;z-index: 99;">
                <?php the_content(); ?>
                </div>
                <p class="author-of-testimonial"><?php the_title(); ?></p>
                <p class="author-workplace">Excel Joinery</p>
                <div class="slide-bg"></div>

                <div class="next">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </div>
                <div class="prev">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </div>
            </div>
            <?php  endwhile; ?>
            <!-- Add Pagination -->
        </div>
        
    </div>
</section>