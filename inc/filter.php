<?php 

add_action('wp_ajax_filterProj', 'filterProj');
add_action('wp_ajax_nopriv_filterProj', 'filterProj');

function filterProj() {
    wp_reset_postdata();
    header('Content-Type: application/json');
    $result = [];
    if (isset($_GET['type'])) {
        $type = $_GET['type'];

        // 1. Setup query arguments
        $projArgs = [
            'post_type' => 'project',
            'tax_query' => [
                [
                    'taxonomy' => 'category',
                    'field' => 'slug', //can be set to ID
                    'terms' => $type //if field is ID you can reference by cat/term number
                ]
            ]
        ];
        // 2. Initialise query instance
        $filteredProjects = new WP_Query( $projArgs );
        // 3. Loop through data and append to result array
        if ($filteredProjects->have_posts()) :
            while ($filteredProjects->have_posts()) : $filteredProjects->the_post();
                $svg = get_field('category_image', 'category_'. the_category_ID( $echo ) .'');
                $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

                switch ($type) {
                    case 'branding':
                        $icon = get_stylesheet_directory_uri() . '/images/pngicons/1.png';
                        break;
                    case 'web':
                        $icon = get_stylesheet_directory_uri() . '/images/pngicons/2.png';
                        break;
                    case 'seo':
                        $icon = get_stylesheet_directory_uri() . '/images/pngicons/3.png';
                        break;
                    case 'design':
                        $icon = get_stylesheet_directory_uri() . '/images/pngicons/4.png';
                        break;
                    case 'social':
                        $icon = get_stylesheet_directory_uri() . '/images/pngicons/5.png';
                        break;
                    case 'strategy':
                        $icon = get_stylesheet_directory_uri() . '/images/pngicons/6.png';
                        break;
                    case 'pr':
                        $icon = get_stylesheet_directory_uri() . '/images/pngicons/7.png';
                        break;
                    case 'print':
                        $icon = get_stylesheet_directory_uri() . '/images/pngicons/8.png';
                        break;
                    case 'email':
                        $icon = get_stylesheet_directory_uri() . '/images/pngicons/9.png';
                        break;
                    case 'ppc':
                        $icon = get_stylesheet_directory_uri() . '/images/pngicons/10.png';
                        break;
                    default:
                        echo 'None';
                }

                $currentProject = [
                    'title' => get_the_title(),
                    'icon' => $icon,
                    'feat_image' => $feat_image,
                    'permalink' => get_the_permalink(),
                ];
                array_push($result, $currentProject);
            endwhile;
        else :

        endif;
        // 4. Return array to JS to do its thing...
        echo json_encode($result);
        die();
    } 
}

?>