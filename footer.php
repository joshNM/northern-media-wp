<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Northern_Media
*/
?>
</div><!-- #content -->
<section id="footer">
	<div class="container">
		<div id="row-1-flex">
			<div class="pull-left">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-footer.c4be9fce.jpg" style="max-width: 100%;">
			</div>
			<div class="pull-right">
			<a href="<?php the_field('facebook_url', 'option'); ?>"><i class="fa fa-facebook"></i></a>
			<a href="<?php the_field('twitter_url', 'option'); ?>"><i class="fa fa-twitter"></i></a>
			<a href="<?php the_field('linkedin_url', 'option'); ?>"><i class="fa fa-linkedin"></i></a>
			<a href="<?php the_field('behance_url', 'option'); ?>"><i class="fa fa-behance"></i></a>

			</div>
	</div>
	<div style="clear: both;"></div>
	<div class="col-md-8" id="footer-info">
		<ul>
			<li><span class="title-footer">Northern Media</span></li>
			<li style="margin-bottom: 20px;">Unit 2, Calder Island, Wakefield, West Yorkshire, Wakefield WF2 7AW</li>
			<li style="margin-bottom: 20px;"><span class="title-footer">T:</span> 01924 367 105</li>
			<li><span class="title-footer">E:</span> info@northernmediauk.com</li>
		</ul>
	</div>
	<div class="col-md-4" id="footer-sitemap">

		<ul class="service-footer">
			<li><span class="title-footer">Services</span></li>

			<?php
			$serviceFooter = array(
				'menu_class' => 'service-footer',
				'theme_location' => 'services'
			);
			?>

			<?php echo wp_nav_menu ( $serviceFooter ); ?>
		</ul>

		<ul class="pages-nav-footer">
			<li><span class="title-footer">Other Pages</span></li>
			<?php
			$pagesFooter = array(
				'menu_class' => 'pages-nav-footer',
				'theme_location' => 'pages'
			);
			?>

			<?php echo wp_nav_menu ( $pagesFooter ); ?>
		</ul>
		<ul>
			<li><span class="title-footer">Keep in Touch</span></li>
			<?php wp_list_categories('title_li='); ?>
<li><a href="<?php the_permalink(21); ?>">Contact</a></li>
<li><a href="<?php the_permalink(19); ?>">News</a></li>
<li><a href="<?php the_field('facebook_url', 'option'); ?>">Facebook</a></li>
<li><a href="<?php the_field('twitter_url', 'option'); ?>">Twitter</a></li>
<li><a href="<?php the_field('linkedin_url', 'option'); ?>">LinkedIn</a></li>
		</ul>
	</div>
</div>
</section>
<!-- end footer -->

</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
