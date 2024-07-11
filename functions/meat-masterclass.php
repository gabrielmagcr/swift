<?php


function mmc_show_not_found() {
    global $wp_query;
    $wp_query->set_404();
    add_action( 'wp_title', function () {
        return '404: Not Found';
    }, 9999 );
    status_header( 404 );
    nocache_headers();
    require get_404_template();
    exit;
}


function swift_mmc_query_vars_filter($vars) {
    $vars[] = 'mmc';
    return $vars;
}

add_filter('query_vars', 'swift_mmc_query_vars_filter');

function swift_mmc_rewrite_rules($rules) {
    global $wp_rewrite;
    $mmc_rule = [
        'meat-masterclass/(.+)/?' => 'index.php?pagename=' . 'meat-masterclass' . '&mmc=$matches[1]',
    ];
    return array_merge($mmc_rule, $rules);
}

add_filter('page_rewrite_rules', 'swift_mmc_rewrite_rules');