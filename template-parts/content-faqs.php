<section class="Faqs">
    <div class="container">
        <center><h2 class="section-title"><?php the_title() ?> FAQs</h2></center>
        
        <div class="flex-faq">

        <?php
        // check if the repeater field has rows of data
        wp_reset_query();
        if( have_rows('faqs') ):
            // loop through the rows of data
            $leftIndex = 0;
            while ( have_rows('faqs') ) : the_row();
        ?>  
            
            <?php if($leftIndex < 3) : ?>
            
                <div class="Faq">
                    <div class="Faq__title">
                        <h3><?php the_sub_field('faq_title'); ?></h3>
                    </div>
                    <div class="Faq__answer">
                        <p><?php the_sub_field('faq_answer'); ?></p>
                    </div>
                </div>
        
            <?php endif; ?>


        <?php
            endwhile;
        else :
            // no rows found
        endif;
        ?>

        </div>

    </div>
</section>