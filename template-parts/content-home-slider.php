<section id="home-slider">
    <!-- Swiper -->
    <div class="swiper-container-home" style="position: relative;">
        <div class="swiper-wrapper" style="position: relative;">
            <?php
            // check if the repeater field has rows of data
            if( have_rows('slides') ):
            // loop through the rows of data
            while ( have_rows('slides') ) : the_row(); ?>
            <div class="swiper-slide">
                
                <img src="<?php the_sub_field('slide_background'); ?>">

                <div class="slide-overlay wow fadeIn" >
                    <?php the_sub_field('slide_content'); ?>
                    
                    <?php if (have_rows('button')): ?>
                        <?php while (have_rows('button')) : the_row(); ?>
                            <a style="color: white !important;" href="<?php the_sub_field('button_link') ?>" class="button"><?php the_sub_field('button_title'); ?></a>
                        <?php endwhile; ?>
                    <?php endif ?>
                    
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
        <div class="swiper-pagination-home"></div>
    </div>
</section>