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


function enqueue_template_styles() {
    // Encola el estilo global, disponible para todas las páginas
    wp_enqueue_style(
        'global-style', 
        get_template_directory_uri() . '/dist/styles/app.css'
    );

    // Mapea las plantillas de página a los archivos de estilos específicos
    $template_styles = array(
        'page-cometogetherandgrill.php'     => 'sweepstakes.css',
        'page-contact.php'     => 'contact.css',
        'page-heritage.php'     => 'heritage.css',
        'page-lamb.php'     => 'veal.css',
        'page-lowes.php'     => 'lowes.css',
        'page-meat-masterclass.php' => 'masterclass.css',
        'page-offers.php'     => 'offers.css',
        'page-privacy-policy.php'     => 'privacy.css',
        'page-products.php'    => 'products.css',
        'page-sitemap.php'     => 'privacy.css',
        'page-store-locator.php'     => 'locator.css',
        'page-sustainability.php'     => 'sustain.css',
        'page-tailgate-with-swift.php'     => 'tailgate_with_swift.css',
        'page-terms.php'     => 'privacy.css',
        'page-tips-recipes.php'     => 'tips.css',
        'page-veal.php'     => 'veal.css',
        'search.php'     => 'search.css',
        'single-tips.php'     => 'recipes.css',
        'single-products.php'     => 'products.css',
        
    );

    foreach ($template_styles as $template => $style_file) {
        if (is_page_template($template)) {
            wp_enqueue_style(
                "{$template}-style", 
                get_template_directory_uri() . "/dist/styles/{$style_file}", 
                array('global-style'), 
                null,
                'all'
            );
        }
    }
}

add_action('wp_enqueue_scripts', 'enqueue_template_styles', 999);


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