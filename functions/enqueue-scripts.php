<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
        
    // Adding scripts file in the footer
    wp_enqueue_script( 'masonry-js', '//unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'flickety', '//unpkg.com/flickity@2/dist/flickity.pkgd.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'popper', '//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/dist/scripts/app.js', array( 'jquery' ), '', true );
    

}
add_action('wp_enqueue_scripts', 'site_scripts', 999);