<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
        
    // Adding scripts file in the footer
    wp_enqueue_script( 'masonry-js', '//unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'flickety', '//unpkg.com/flickity@2/dist/flickity.pkgd.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'popper', '//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/dist/scripts/app.js', array( 'jquery' ), '', true );
    
    // Register main stylesheet
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/dist/styles/app.css', array(), filemtime( get_template_directory().'/dist/styles/app.css' ) );
    
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
add_action('wp_enqueue_scripts', 'site_scripts', 999);