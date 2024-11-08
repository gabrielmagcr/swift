<?php
/** 
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */			
	
// Theme support options
require_once(get_template_directory().'/functions/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php'); 


// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php'); 

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php'); 

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php'); 

// Adds support for multiple languages
// require_once(get_template_directory().'/functions/translation/translation.php'); 

// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/functions/editor-styles.php'); 

// Use this as a template for custom post types
require_once(get_template_directory().'/functions/custom-post-type.php');

// Meat Masterclass Subpages
require_once(get_template_directory().'/functions/meat-masterclass.php');

// Activations Subpages
require_once(get_template_directory().'/functions/activations.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/functions/login.php'); 

// disable for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

add_image_size( 'tips-thumb', 540,9999, array('center', 'top') );



// lazy load 
function enqueue_lazyload_script() {
    wp_enqueue_script( 'jquery-lazy', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.10/jquery.lazy.min.js', array('jquery'), '1.7.10', true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_lazyload_script' );

function initialize_lazy_load_script() {
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.lazy').Lazy({
            attribute: 'data-bg',
            afterLoad: function(element) {
                element.css('background-image', element.attr('data-bg'));
                element.removeAttr('data-bg'); 
            }
        });
    });
    </script>
    <?php
}
add_action('wp_footer', 'initialize_lazy_load_script');

// ALLOW SVG
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

function common_svg_media_thumbnails($response, $attachment, $meta){
    if($response['type'] === 'image' && $response['subtype'] === 'svg+xml' && class_exists('SimpleXMLElement'))
    {
        try {
            $path = get_attached_file($attachment->ID);
            if(@file_exists($path))
            {
                $svg = new SimpleXMLElement(@file_get_contents($path));
                $src = $response['url'];
                $width = (int) $svg['width'];
                $height = (int) $svg['height'];

                //media gallery
                $response['image'] = compact( 'src', 'width', 'height' );
                $response['thumb'] = compact( 'src', 'width', 'height' );

                //media single
                $response['sizes']['full'] = array(
                    'height'        => $height,
                    'width'         => $width,
                    'url'           => $src,
                    'orientation'   => $height > $width ? 'portrait' : 'landscape'
                );
            }
        }
        catch(Exception $e){}
    }

    return $response;
}
add_filter('wp_prepare_attachment_for_js', 'common_svg_media_thumbnails', 10, 3);
// END ALLOW SVG