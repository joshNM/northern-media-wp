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
		get_template_part( 'template-parts/content', 'slider' );

		// Start loop...
		if ( have_posts() ) : while ( have_posts() ) : the_post();
		$userID = $post->post_author;

		$position =  get_field('position', 'user_' . $userID);
		$profilePhoto = get_field('profile_photo', 'user_' . $userID);
		$twitterURL = get_field('twitter', 'user_' . $userID);
		$facebookURL = get_field('facebook', 'user_' . $userID);
		$linkedinURL = get_field('linkedin', 'user_' . $userID);

	 ?>

	<section id="article">
		<div class="container">
			<h2 class="section-title"><?php the_title(); ?></h2>
			<article>


					<?php the_content(); ?>

					<div id="author">
						<img src="<?php echo $profilePhoto; ?>" style="margin-right: 15px;">

						<div id="author-info">
							<h3><b>Written by <?php the_author(); ?></b></h3>
							<h3><?php echo $position; ?></h3>
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" style="color: white;">	<button class="button">View Profile</button></a>
							<div class="arrow-left"></div>
						</div>
					</div>
					<span id="back"><a href="javascript: history.go(-1)"> <i class="fa fa-caret-left" aria-hidden="true"></i>
Back</a></span>

			</article>
		</div>
	</section>
	<!-- end article -->

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
