<section id="home-slider">
    <!-- Swiper -->
    <div class="swiper-container-home" style="position: relative;">
        <div class="swiper-wrapper" style="position: relative;">
            <?php
            // check if the repeater field has rows of data
            if( have_rows('slides') ):
            // loop through the rows of data
            while ( have_rows('slides') ) : the_row(); ?>
            <div class="swiper-slide" style="color: white;background: url(<?php the_sub_field('slide_background'); ?>); background-size: cover; background-position: center center;">
                
                <div class="slide-overlay">
                    <?php the_sub_field('slide_content'); ?>
                    <div style="margin-bottom: 10px;height: 10px;"></div>
                    <button class="button">Enquire</button>
                    <button class="button">Latest Projects</button>
                </div>
                
          
                <div class="slide-bg"></div>
            </div>
            <?php  endwhile;
            else :
            // no rows found
            endif;
            ?>
            <!-- Add Pagination -->
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>