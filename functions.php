<?php
/**
 * Northern Media functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Northern_Media
 */

if ( ! function_exists( 'northern_media_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function northern_media_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Northern Media, use a find and replace
	 * to change 'northern_media' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'northern_media', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'northern_media' ),
		'secondary' => esc_html__( 'Secondary', 'northern_media' ),
		'services' => esc_html__( 'Services', 'northern_media' ),
		'pages' => esc_html__( 'Pages', 'northern_media' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'northern_media_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'northern_media_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function northern_media_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'northern_media_content_width', 640 );
}
add_action( 'after_setup_theme', 'northern_media_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function northern_media_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'northern_media' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'northern_media_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function northern_media_scripts() {
	wp_enqueue_style( 'northern_media-style', get_stylesheet_uri() );

	wp_enqueue_script( 'northern_media-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );


	wp_enqueue_script( 'matchheight', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js', array(), '1', true );

	wp_enqueue_script( 'northern_media-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'northern_media_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/*
* Personal Functions etc. go here...
*/

// Disable updates for ACF
function filter_plugin_updates( $value ) {
	if( isset( $value->response['advanced-custom-fields-pro/acf.php'] ) ) {
    unset( $value->response['advanced-custom-fields-pro/acf.php'] );
    return $value;
}
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

// END FUNCTION

// Allow SVG's
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg_thumb_display() {
  echo '
    td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail {
      width: 100% !important;
      height: auto !important;
    }
  ';
}

// END FUNCTION

// Ajax filter stuff

function addScriptsForAjax() {
	$pluginUrl = plugin_dir_url( __FILE__ );
	wp_enqueue_script( 'search', $pluginUrl . '/js/main.js', array('jquery'), '1.0', true );

	wp_localize_script('search', 'ajax_url', admin_url('admin-ajax.php'));

}

function filterProjects($slug) {

	ob_start();
	// Add dependant scripts
	addScriptsForAjax();

	// Get post slug

	// Find out what filters belong to posts of this type
	$categoriesA = new WP_Query(array(
			      'post_type' => 'project',
			      'taxonomy'=>'category',
			      'term' => $slug,
	));

	$newCategoriesArray = array();

	while ($categoriesA->have_posts()) {

		$categoriesA->the_post();

		if (in_array(get_field('filter'), $newCategoriesArray) ) {

		} else {
			array_push($newCategoriesArray, get_field('filter'));
		}


	}

	// Get values
    $choicesArr = $newCategoriesArray;

	?>

	<div id="filter">
	<ul>
		<form action="" method="get">
		<li><input type="radio" value="All" id="slideOne" name="check" /> All </li>
		<?php
			foreach ($choicesArr as $key => $value) {
				echo '<li><input type="radio" value="'.$value.'" id="'.$value.'" name="check" />'. ' ' . $value.'</li>';
			}
		 ?>
			<li><button class="button" type="submit">Filter</button></li>
		</form>
	</ul>
	</div>

<?php
}

// DO SAME FOR CASE STUDIES HERE
function filterCases() {

	ob_start();
	// Add dependant scripts
	addScriptsForAjax();

    $servicesArgs = array(
      'post_parent' =>  11,
      'post_type' => 'page',
      'order' => 'asc'
    );

    $services = new WP_Query( $servicesArgs );

    if ( $services->have_posts() ) : ?>

    <ul id="case-nav">

    <?php while ( $services->have_posts() ) : $services->the_post();
    $svg = get_field('category_image', 'category_'. the_category_ID( $echo ) .'');
    $categories = get_the_category();
    ?>


      <li class="<?php echo $categories[0]->slug; ?>" data-id="case-study-button">
        <div>
          <img class="svg" src="<?php echo $svg['url']; ?>" style="width: 80px; height: 80px;" alt=""/>
        </div>
        <?php the_title(); ?>
        </li>

<?php
        endwhile;
        wp_reset_postdata();
        else :
        _e( 'Sorry, no posts matched your criteria.' );
        endif;
?>
</ul>
<?php
}



add_action('wp_ajax_filterProjects', 'filterProjectsCallback');
add_action('wp_ajax_nopriv_filterProjects', 'filterProjectsCallback');

// case studies
add_action('wp_ajax_filterCases', 'filterCasesCallback');
add_action('wp_ajax_nopriv_filterCases', 'filterCasesCallback');

function filterProjectsCallback() {

$finalSlug = $_GET['more'];

header('Content-Type: application/json');
wp_reset_postdata();
if (isset($_GET['type'])) {
	$type = $_GET['type'];
	if ($type === 'All') {
		$hall2 = new WP_Query(array(
			 'post_type' 		=> 'project',
			 'posts_per_page' 	=> -1,
			 'taxonomy'=>'category',
			  'term' => $finalSlug,
		 ));
	} else {
		$hall2 = new WP_Query(array(
			 'post_type' 		=> 'project',
			 'posts_per_page' 	=> -1,
			 'taxonomy'=>'category',
			  'term' => $finalSlug,
				'meta_query' => array (
					 array (
						 'key' => 'filter',
						 'value' => $type,
						 'compare' => 'IN'
						)
					)
		 ));
	}
}

$result = array();

if ($hall2->have_posts()) {

	while ($hall2->have_posts()) {

		$hall2->the_post();

		$choices = get_field('filter');

		$svg = get_field('category_image', 'category_'. the_category_ID( $echo ) .'');

      	$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

  	    $cats = get_the_category();

  	    // get post likes
  	    $post_likes = get_post_meta(get_the_ID(), '_post_like_count');
  	    $function = get_simple_likes_button( get_the_ID() );

				$sharing = crunch();
		//if ($choices[0] == $type) {

			$result[] = array(
				'id' => get_the_ID(),
				'title' => get_the_title(),
				'permalink' => get_the_permalink(),
				'image_url' => $feat_image,
				'cats' => $cats,
				'svg' => $svg,
				'test' => $finalSlug,
				'funct' => $function,
				'sharing' => $sharing,
			);

		//}

		}

	} else {
		$result = 'No results to show.';
	}



	echo json_encode($result);

	wp_die();
}

// case studies
function filterCasesCallback() {
wp_reset_postdata();


header('Content-Type: application/json');

$caseType = $_GET['casetype'];

if ($caseType == 'welcome') {
	$caseStudies = new WP_Query(array(
		'post_type' 		=> 'project',
		'posts_per_page' 	=> -1,
		'taxonomy'=>'category',
	));
} else {
	$caseStudies = new WP_Query(array(
		'post_type' 		=> 'project',
		'posts_per_page' 	=> -1,
		'taxonomy'=>'category',
		'term' => $caseType,
	));
}


$case_result = array();

if ($caseStudies->have_posts()) {

	while ($caseStudies->have_posts()) {

		$caseStudies->the_post();


		$svg = get_field('category_image', 'category_'. the_category_ID( $echo ) .'');

		$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

		$cats = get_the_category();

		// $share = crunch();

		$post_likes = get_post_meta(get_the_ID(), '_post_like_count');
		$likes = get_simple_likes_button( get_the_ID() );
		$share = crunch();

		//if ($choices[0] == $type) {

		$case_result[] = array(
			'id' => get_the_ID(),
			'title' => get_the_title(),
			'permalink' => get_the_permalink(),
			'image_url' => $feat_image,
			'cats' => $cats,
			'svg' => $svg,
			'like_button' => $likes,
			'share' => $share

		);

		//}

		}

	} else {
		$case_result = 'No results to show.';
	}

	echo json_encode($case_result);

	wp_die();


}

// FIle permissions
if ( is_admin() ) {
add_filter( 'filesystem_method', create_function( '$a', 'return "direct";' ) );
if ( ! defined( 'FS_CHMOD_DIR' ) ) {
define( 'FS_CHMOD_DIR', 0751 );
}
}

// Do some options page stuff
if( function_exists('acf_add_options_page') ) {

	$option_page = acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title' 	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false,
		'parent_slug' => 'options-general.php'
	));

}


/*
Name:  WordPress Post Like System
Description:  A simple and efficient post like system for WordPress.
Version:      0.5.2
Author:       Jon Masterson
Author URI:   http://jonmasterson.com/
License:
Copyright (C) 2015 Jon Masterson
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
/**
 * Register the stylesheets for the public-facing side of the site.
 * @since    0.5
 */
add_action( 'wp_enqueue_scripts', 'sl_enqueue_scripts' );
function sl_enqueue_scripts() {
	wp_enqueue_script( 'simple-likes-public-js', get_template_directory_uri() . '/js/simple-likes-public.js', array( 'jquery' ), '0.5', false );
	wp_localize_script( 'simple-likes-public-js', 'simpleLikes', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'like' => __( 'Like', 'YourThemeTextDomain' ),
		'unlike' => __( 'Unlike', 'YourThemeTextDomain' )
	) );
}
/**
 * Processes like/unlike
 * @since    0.5
 */
add_action( 'wp_ajax_nopriv_process_simple_like', 'process_simple_like' );
add_action( 'wp_ajax_process_simple_like', 'process_simple_like' );
function process_simple_like() {
	// Security
	$nonce = isset( $_REQUEST['nonce'] ) ? sanitize_text_field( $_REQUEST['nonce'] ) : 0;
	if ( !wp_verify_nonce( $nonce, 'simple-likes-nonce' ) ) {
		exit( __( 'Not permitted', 'YourThemeTextDomain' ) );
	}
	// Test if javascript is disabled
	$disabled = ( isset( $_REQUEST['disabled'] ) && $_REQUEST['disabled'] == true ) ? true : false;
	// Test if this is a comment
	$is_comment = ( isset( $_REQUEST['is_comment'] ) && $_REQUEST['is_comment'] == 1 ) ? 1 : 0;
	// Base variables
	$post_id = ( isset( $_REQUEST['post_id'] ) && is_numeric( $_REQUEST['post_id'] ) ) ? $_REQUEST['post_id'] : '';
	$result = array();
	$post_users = NULL;
	$like_count = 0;
	// Get plugin options
	if ( $post_id != '' ) {
		$count = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_comment_like_count", true ) : get_post_meta( $post_id, "_post_like_count", true ); // like count
		$count = ( isset( $count ) && is_numeric( $count ) ) ? $count : 0;
		if ( !already_liked( $post_id, $is_comment ) ) { // Like the post
			if ( is_user_logged_in() ) { // user is logged in
				$user_id = get_current_user_id();
				$post_users = post_user_likes( $user_id, $post_id, $is_comment );
				if ( $is_comment == 1 ) {
					// Update User & Comment
					$user_like_count = get_user_option( "_comment_like_count", $user_id );
					$user_like_count =  ( isset( $user_like_count ) && is_numeric( $user_like_count ) ) ? $user_like_count : 0;
					update_user_option( $user_id, "_comment_like_count", ++$user_like_count );
					if ( $post_users ) {
						update_comment_meta( $post_id, "_user_comment_liked", $post_users );
					}
				} else {
					// Update User & Post
					$user_like_count = get_user_option( "_user_like_count", $user_id );
					$user_like_count =  ( isset( $user_like_count ) && is_numeric( $user_like_count ) ) ? $user_like_count : 0;
					update_user_option( $user_id, "_user_like_count", ++$user_like_count );
					if ( $post_users ) {
						update_post_meta( $post_id, "_user_liked", $post_users );
					}
				}
			} else { // user is anonymous
				$user_ip = sl_get_ip();
				$post_users = post_ip_likes( $user_ip, $post_id, $is_comment );
				// Update Post
				if ( $post_users ) {
					if ( $is_comment == 1 ) {
						update_comment_meta( $post_id, "_user_comment_IP", $post_users );
					} else {
						update_post_meta( $post_id, "_user_IP", $post_users );
					}
				}
			}
			$like_count = ++$count;
			$response['status'] = "liked";
			$response['icon'] = get_liked_icon();
		} else { // Unlike the post
			if ( is_user_logged_in() ) { // user is logged in
				$user_id = get_current_user_id();
				$post_users = post_user_likes( $user_id, $post_id, $is_comment );
				// Update User
				if ( $is_comment == 1 ) {
					$user_like_count = get_user_option( "_comment_like_count", $user_id );
					$user_like_count =  ( isset( $user_like_count ) && is_numeric( $user_like_count ) ) ? $user_like_count : 0;
					if ( $user_like_count > 0 ) {
						update_user_option( $user_id, "_comment_like_count", --$user_like_count );
					}
				} else {
					$user_like_count = get_user_option( "_user_like_count", $user_id );
					$user_like_count =  ( isset( $user_like_count ) && is_numeric( $user_like_count ) ) ? $user_like_count : 0;
					if ( $user_like_count > 0 ) {
						update_user_option( $user_id, '_user_like_count', --$user_like_count );
					}
				}
				// Update Post
				if ( $post_users ) {
					$uid_key = array_search( $user_id, $post_users );
					unset( $post_users[$uid_key] );
					if ( $is_comment == 1 ) {
						update_comment_meta( $post_id, "_user_comment_liked", $post_users );
					} else {
						update_post_meta( $post_id, "_user_liked", $post_users );
					}
				}
			} else { // user is anonymous
				$user_ip = sl_get_ip();
				$post_users = post_ip_likes( $user_ip, $post_id, $is_comment );
				// Update Post
				if ( $post_users ) {
					$uip_key = array_search( $user_ip, $post_users );
					unset( $post_users[$uip_key] );
					if ( $is_comment == 1 ) {
						update_comment_meta( $post_id, "_user_comment_IP", $post_users );
					} else {
						update_post_meta( $post_id, "_user_IP", $post_users );
					}
				}
			}
			$like_count = ( $count > 0 ) ? --$count : 0; // Prevent negative number
			$response['status'] = "unliked";
			$response['icon'] = get_unliked_icon();
		}
		if ( $is_comment == 1 ) {
			update_comment_meta( $post_id, "_comment_like_count", $like_count );
			update_comment_meta( $post_id, "_comment_like_modified", date( 'Y-m-d H:i:s' ) );
		} else {
			update_post_meta( $post_id, "_post_like_count", $like_count );
			update_post_meta( $post_id, "_post_like_modified", date( 'Y-m-d H:i:s' ) );
		}
		$response['count'] = get_like_count( $like_count );
		$response['testing'] = $is_comment;
		if ( $disabled == true ) {
			if ( $is_comment == 1 ) {
				wp_redirect( get_permalink( get_the_ID() ) );
				exit();
			} else {
				wp_redirect( get_permalink( $post_id ) );
				exit();
			}
		} else {
			wp_send_json( $response );
		}
	}
}
/**
 * Utility to test if the post is already liked
 * @since    0.5
 */
function already_liked( $post_id, $is_comment ) {
	$post_users = NULL;
	$user_id = NULL;
	if ( is_user_logged_in() ) { // user is logged in
		$user_id = get_current_user_id();
		$post_meta_users = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_user_comment_liked" ) : get_post_meta( $post_id, "_user_liked" );
		if ( count( $post_meta_users ) != 0 ) {
			$post_users = $post_meta_users[0];
		}
	} else { // user is anonymous
		$user_id = sl_get_ip();
		$post_meta_users = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_user_comment_IP" ) : get_post_meta( $post_id, "_user_IP" );
		if ( count( $post_meta_users ) != 0 ) { // meta exists, set up values
			$post_users = $post_meta_users[0];
		}
	}
	if ( is_array( $post_users ) && in_array( $user_id, $post_users ) ) {
		return true;
	} else {
		return false;
	}
} // already_liked()
/**
 * Output the like button
 * @since    0.5
 */
function get_simple_likes_button( $post_id, $is_comment = NULL ) {
	$is_comment = ( NULL == $is_comment ) ? 0 : 1;
	$output = '';
	$nonce = wp_create_nonce( 'simple-likes-nonce' ); // Security
	if ( $is_comment == 1 ) {
		$post_id_class = esc_attr( ' sl-comment-button-' . $post_id );
		$comment_class = esc_attr( ' sl-comment' );
		$like_count = get_comment_meta( $post_id, "_comment_like_count", true );
		$like_count = ( isset( $like_count ) && is_numeric( $like_count ) ) ? $like_count : 0;
	} else {
		$post_id_class = esc_attr( ' sl-button-' . $post_id );
		$comment_class = esc_attr( '' );
		$like_count = get_post_meta( $post_id, "_post_like_count", true );
		$like_count = ( isset( $like_count ) && is_numeric( $like_count ) ) ? $like_count : 0;
	}
	$count = get_like_count( $like_count );
	$icon_empty = get_unliked_icon();
	$icon_full = get_liked_icon();
	// Loader
	$loader = '<span id="sl-loader"></span>';
	// Liked/Unliked Variables
	if ( already_liked( $post_id, $is_comment ) ) {
		$class = esc_attr( ' liked' );
		$title = __( 'Unlike', 'YourThemeTextDomain' );
		$icon = $icon_full;
	} else {
		$class = '';
		$title = __( 'Like', 'YourThemeTextDomain' );
		$icon = $icon_empty;
	}
	$output = '<span class="sl-wrapper"><a href="' . admin_url( 'admin-ajax.php?action=process_simple_like' . '&post_id=' . $post_id . '&nonce=' . $nonce . '&is_comment=' . $is_comment . '&disabled=true' ) . '" class="sl-button' . $post_id_class . $class . $comment_class . '" data-nonce="' . $nonce . '" data-post-id="' . $post_id . '" data-iscomment="' . $is_comment . '" title="' . $title . '">' . $icon . $count . '</a>' . $loader . '</span>';
	return $output;
} // get_simple_likes_button()
/**
 * Processes shortcode to manually add the button to posts
 * @since    0.5
 */
add_shortcode( 'jmliker', 'sl_shortcode' );
function sl_shortcode() {
	return get_simple_likes_button( get_the_ID(), 0 );
} // shortcode()
/**
 * Utility retrieves post meta user likes (user id array),
 * then adds new user id to retrieved array
 * @since    0.5
 */
function post_user_likes( $user_id, $post_id, $is_comment ) {
	$post_users = '';
	$post_meta_users = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_user_comment_liked" ) : get_post_meta( $post_id, "_user_liked" );
	if ( count( $post_meta_users ) != 0 ) {
		$post_users = $post_meta_users[0];
	}
	if ( !is_array( $post_users ) ) {
		$post_users = array();
	}
	if ( !in_array( $user_id, $post_users ) ) {
		$post_users['user-' . $user_id] = $user_id;
	}
	return $post_users;
} // post_user_likes()
/**
 * Utility retrieves post meta ip likes (ip array),
 * then adds new ip to retrieved array
 * @since    0.5
 */
function post_ip_likes( $user_ip, $post_id, $is_comment ) {
	$post_users = '';
	$post_meta_users = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_user_comment_IP" ) : get_post_meta( $post_id, "_user_IP" );
	// Retrieve post information
	if ( count( $post_meta_users ) != 0 ) {
		$post_users = $post_meta_users[0];
	}
	if ( !is_array( $post_users ) ) {
		$post_users = array();
	}
	if ( !in_array( $user_ip, $post_users ) ) {
		$post_users['ip-' . $user_ip] = $user_ip;
	}
	return $post_users;
} // post_ip_likes()
/**
 * Utility to retrieve IP address
 * @since    0.5
 */
function sl_get_ip() {
	if ( isset( $_SERVER['HTTP_CLIENT_IP'] ) && ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) && ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = ( isset( $_SERVER['REMOTE_ADDR'] ) ) ? $_SERVER['REMOTE_ADDR'] : '0.0.0.0';
	}
	$ip = filter_var( $ip, FILTER_VALIDATE_IP );
	$ip = ( $ip === false ) ? '0.0.0.0' : $ip;
	return $ip;
} // sl_get_ip()
/**
 * Utility returns the button icon for "like" action
 * @since    0.5
 */
function get_liked_icon() {
	/* If already using Font Awesome with your theme, replace svg with: <i class="fa fa-heart"></i> */
	$icon = '<span class="sl-icon"><svg role="img" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0" y="0" viewBox="0 0 128 128" enable-background="new 0 0 128 128" xml:space="preserve"><path id="heart-full" d="M124 20.4C111.5-7 73.7-4.8 64 19 54.3-4.9 16.5-7 4 20.4c-14.7 32.3 19.4 63 60 107.1C104.6 83.4 138.7 52.7 124 20.4z"/>&#9829;</svg></span>';
	return $icon;
} // get_liked_icon()
/**
 * Utility returns the button icon for "unlike" action
 * @since    0.5
 */
function get_unliked_icon() {
	/* If already using Font Awesome with your theme, replace svg with: <i class="fa fa-heart-o"></i> */
	$icon = '<span class="sl-icon"><svg role="img" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0" y="0" viewBox="0 0 128 128" enable-background="new 0 0 128 128" xml:space="preserve"><path id="heart" d="M64 127.5C17.1 79.9 3.9 62.3 1 44.4c-3.5-22 12.2-43.9 36.7-43.9 10.5 0 20 4.2 26.4 11.2 6.3-7 15.9-11.2 26.4-11.2 24.3 0 40.2 21.8 36.7 43.9C124.2 62 111.9 78.9 64 127.5zM37.6 13.4c-9.9 0-18.2 5.2-22.3 13.8C5 49.5 28.4 72 64 109.2c35.7-37.3 59-59.8 48.6-82 -4.1-8.7-12.4-13.8-22.3-13.8 -15.9 0-22.7 13-26.4 19.2C60.6 26.8 54.4 13.4 37.6 13.4z"/>&#9829;</svg></span>';
	return $icon;
} // get_unliked_icon()
/**
 * Utility function to format the button count,
 * appending "K" if one thousand or greater,
 * "M" if one million or greater,
 * and "B" if one billion or greater (unlikely).
 * $precision = how many decimal points to display (1.25K)
 * @since    0.5
 */
function sl_format_count( $number ) {
	$precision = 2;
	if ( $number >= 1000 && $number < 1000000 ) {
		$formatted = number_format( $number/1000, $precision ).'K';
	} else if ( $number >= 1000000 && $number < 1000000000 ) {
		$formatted = number_format( $number/1000000, $precision ).'M';
	} else if ( $number >= 1000000000 ) {
		$formatted = number_format( $number/1000000000, $precision ).'B';
	} else {
		$formatted = $number; // Number is less than 1000
	}
	$formatted = str_replace( '.00', '', $formatted );
	return $formatted;
} // sl_format_count()
/**
 * Utility retrieves count plus count options,
 * returns appropriate format based on options
 * @since    0.5
 */
function get_like_count( $like_count ) {
	$like_text = __( 'Like', 'YourThemeTextDomain' );
	if ( is_numeric( $like_count ) && $like_count > 0 ) {
		$number = sl_format_count( $like_count );
	} else {
		$number = $like_text;
	}
	$count = '<span class="sl-count">' . $number . '</span>';
	return $count;
} // get_like_count()
// User Profile List
add_action( 'show_user_profile', 'show_user_likes' );
add_action( 'edit_user_profile', 'show_user_likes' );
function show_user_likes( $user ) { ?>
	<table class="form-table">
		<tr>
			<th><label for="user_likes"><?php _e( 'You Like:', 'YourThemeTextDomain' ); ?></label></th>
			<td>
			<?php
			$types = get_post_types( array( 'public' => true ) );
			$args = array(
			  'numberposts' => -1,
			  'post_type' => $types,
			  'meta_query' => array (
				array (
				  'key' => '_user_liked',
				  'value' => $user->ID,
				  'compare' => 'LIKE'
				)
			  ) );
			$sep = '';
			$like_query = new WP_Query( $args );
			if ( $like_query->have_posts() ) : ?>
			<p>
			<?php while ( $like_query->have_posts() ) : $like_query->the_post();
			echo $sep; ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			<?php
			$sep = ' &middot; ';
			endwhile;
			?>
			</p>
			<?php else : ?>
			<p><?php _e( 'You do not like anything yet.', 'YourThemeTextDomain' ); ?></p>
			<?php
			endif;
			wp_reset_postdata();
			?>
			</td>
		</tr>
	</table>
<?php } // show_user_likes()


// CRUNCHIFY SOCIAL SessionHandlerInterfacefunction crunchify_social_sharing_buttons($content) {
function crunch() {
	// Get current page URL
	$crunchifyURL = get_permalink();

	// Get current page title
	$crunchifyTitle = str_replace( ' ', '%20', get_the_title());

	// Get Post Thumbnail for pinterest
	$crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

	// Construct sharing URL without using any script
	$twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';
	$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
	$googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
	$bufferURL = 'https://bufferapp.com/add?url='.$crunchifyURL.'&amp;text='.$crunchifyTitle;

	// Based on popular demand added Pinterest too
	$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;

	// Add sharing button at the end of page/page content
	$content .= '<!-- Crunchify.com social sharing. Get your copy here: http://crunchify.me/1VIxAsz -->';
	$content .= '<div class="crunchify-social">';
	$content .= '<a class="crunchify-link crunchify-twitter" href="'. $twitterURL .'" target="_blank">Twitter</a>';
	$content .= '<a class="crunchify-link crunchify-facebook" href="'.$facebookURL.'" target="_blank">Facebook</a>';
	$content .= '<a class="crunchify-link crunchify-googleplus" href="'.$googleURL.'" target="_blank">Google+</a>';
	$content .= '</div>';

	return $content;

}
