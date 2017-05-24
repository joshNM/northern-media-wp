<?php
/**
* The template for displaying all single posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package Northern_Media
*/
get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php

		// Service nav
		get_template_part( 'template-parts/content', 'servicenav' );

		// Start loop...
		if ( have_posts() ) : while ( have_posts() ) : the_post();
		$userID = $post->post_author;

		$position =  get_field('position', 'user_' . $userID);
		$profilePhoto = get_field('profile_photo', 'user_' . $userID);
		$twitterURL = get_field('twitter', 'user_' . $userID);
		$facebookURL = get_field('facebook', 'user_' . $userID);
		$linkedinURL = get_field('linkedin', 'user_' . $userID);

	 ?>

   <section id="approach-jumbo" >
 		<div class="container">
 			<h2 class="wow fadeInDown"><?php the_title(); ?></h2>
 		</div>
 	</section>
 	<section id="design-approach" class="inner-approach">
 		<div class="container">
 		<?php the_field('content'); ?>
 		</div>
 	</div>
 </section>


	<?php

	endwhile; else :
		echo 'Nothing to show here, sorry!';
	endif;

		// Newsletter
		get_template_part( 'template-parts/content', 'newsletter' );

		// Contact
		get_template_part( 'template-parts/content', 'contact' );

	 ?>

	</main><!-- #main -->
	</div><!-- #primary -->
	<?php
	get_footer();
