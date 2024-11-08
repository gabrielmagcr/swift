<?php
function enqueue_template_styles() {
    // Encola el estilo global, disponible para todas las páginas


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
