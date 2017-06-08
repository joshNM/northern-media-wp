<?php
/**
* The template for displaying all pages.
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages
* and that other 'pages' on your WordPress site may use a
* different template.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Northern_Media
*/
get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	<?php get_template_part( 'template-parts/content', 'servicenav' ); ?>
	<?php

		$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
		$userID = $name = $curauth->data->ID;
		$name = $curauth->data->display_name;
		$email = $curauth->data->user_email;
		$position =  get_field('position', 'user_' . $userID);
		$profilePhoto = get_field('profile_photo', 'user_' . $userID);
		$twitterURL = get_field('twitter', 'user_' . $userID);
		$facebookURL = get_field('facebook', 'user_' . $userID);
		$linkedinURL = get_field('linkedin', 'user_' . $userID);
	 ?>

	<section id="profile">
		<div class="container">
			<div><h2 class="section-title">Up Close & Personal</h2></div>
			<div id="profile-img">
				<img src="<?php echo $profilePhoto; ?>">
			</div>
			<div id="profile-content">
				<i class="fa fa-commenting-o"></i>
				<h3>I'm <?php echo $name; ?></h3>
				<h4><?php echo $position; ?></h4>
				<p><?php echo nl2br(get_the_author_meta( 'user_description', $userID )); ?></p>
				<ul>
					<li><span>e: </span><?php echo $email; ?></li>
					<li><span>t: </span> 01924 837789</li>
					<li>
					<a href="<?php echo $facebookURL; ?>" style="color: white;"><i class="fa fa-facebook"></a></i>
					<a href="<?php echo $twitterURL; ?>" style="color: white;"><i class="fa fa-twitter"></i></a>
					<a href="<?php echo $linkedinURL; ?>" style="color: white;"><i class="fa fa-linkedin"></i></a>
					</li>
				</ul>
			</div>
			<div style="clear: both"></div>
		</div>
	</section>
	<!-- end profile -->
	<div class="team-posts-wrap-auth">
	<div class="team-posts" style="background: none; max-width: 450px;">
		<div class="right" style="padding: 1em;">
		<i class="fa fa-times auth-cross" aria-hidden="true" style=""></i>
			<h4><i class="fa fa-comment" aria-hidden="true"></i> Keep up to date with <?php echo $name ?></h4>
			<hr>
			<ul class="timeline-ul">
			<?php

			// check if the repeater field has rows of data
			if( have_rows('timeline', 'user_' . $userID) ):

				// loop through the rows of data
					while ( have_rows('timeline', 'user_' . $userID) ) : the_row();

							// display a sub field value
							?> <li class="post-timeline"> <?php the_sub_field('post');?> </li>
							<hr>

					<?php endwhile;

			else :

					echo '<li class="post-timeline">Sorry, there is nothing to show yet...</li>';

			endif;

			?>
			</ul>
		</div>
	</div>
</div>
	<!-- end team posts -->

	<?php
		// Approach
		get_template_part( 'template-parts/content', 'team' );
		// News
		get_template_part( 'template-parts/content', 'latestnews' );
		// Newsletter
		get_template_part( 'template-parts/content', 'newsletter' );
		// Contact
		get_template_part( 'template-parts/content', 'contact' );
	?>

	</main><!-- #main -->
	</div><!-- #primary -->
	<?php
	get_footer();
