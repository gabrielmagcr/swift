<?php

function swift_get_activations_loop() {
    $args = array(
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_type' => ['activation'],
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'meta_query' => []
    );

    $query = new WP_Query($args);
    return $query;
}
