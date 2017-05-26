<section id="employee-news">
    <div class="container">
        <div class="center"><h2 class="section-title">Employee News</h2></div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi.</p>

        <div class="row">

            <?php 
                $employeeArgs = [
                    'post_type' => 'post',
                    'category__in' => 18
                ];

                $employeeArticle = new WP_Query($employeeArgs);
            ?>
            <?php while($employeeArticle->have_posts()) : $employeeArticle->the_post(); ?>
                <div class="col-md-4">
                    <div class="employee-article">
                    <img src="<?php the_post_thumbnail_url(); ?>">
         
                    </div>
                </div>
            <?php endwhile; ?>


        </div>

    </div>
</section>