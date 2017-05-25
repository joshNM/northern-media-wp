<section id="responsive-nav">
	<div class="responsive-nav__wrapper">
		<ul class="responsive-nav__nav wow fadeInDown">
		<?php
          $headerResponsive = array(
            'menu_class' => 'responsive-nav__nav',
            'theme_location' => 'primary',
            'depth' => 1
          );
        ?>

        <?php echo wp_nav_menu ( $headerResponsive ) ?>

		</ul>
	</div>
</section>