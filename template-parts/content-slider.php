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
                    <?php if(get_sub_field('main_headline')) : ?>
                    <h1><?php the_sub_field('main_headline') ?></h1>
                    <?php endif; ?>
                    <?php if(get_sub_field('secondary_headline')) : ?>
                    <h2><?php the_sub_field('secondary_headline') ?></h2>
                    <?php endif; ?>

                    

                    <?php if (have_rows('button')): ?>
                        <?php while (have_rows('button')) : the_row(); ?>
                            <a style="color: white !important;" href="<?php the_sub_field('button_link') ?>" class="button"><?php the_sub_field('button_title'); ?></a>
                        <?php endwhile; ?>
                    <?php endif ?>

                </div>
                
                <?php if(!is_singular('project')) : ?>
                    <div class="slide-bg"></div>
                <?php endif; ?>           

                <div class="next">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </div>
                <div class="prev">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </div>

            </div>
            <?php  endwhile;
            else :
            // no rows found
            endif;
            ?>
            <!-- Add Pagination -->
        </div>
        
    </div>
</section>