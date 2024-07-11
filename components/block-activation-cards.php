<?php
function get_term_ids() {
    $terms = get_the_terms(get_the_id(), 'activation-type');
    $ids = $terms ? array_map(function ($term) {
        return $term->term_id;
    }, $terms) : [];
    return join(',', $ids);
}
?>

<?php $loop = swift_get_activations_loop(); ?>
<?php if ($loop->have_posts()) : ?>
    <div class="container">
        <div class="row">
            <?php while ($loop->have_posts()) : $loop->the_post(); $terms = get_term_ids(); $image = get_field('card_image'); ?>
            <div class="col-12 col-md-6 col-lg-4 activation-wrapper mb-4" data-activation="<?php print $terms; ?>">
                <div class="card card-style--1 activation flex-grow-1">
                    <div class="card-img" style="background: url('<?php print $image ? $image['url'] : ''; ?>') no-repeat center / cover;">

                    </div>
                    <div class="card-body">
                        <a href="<?php print get_the_permalink(); ?>" class="stretched-link"></a>
                        <h3><?php print get_field('card_title_override') ? get_field('card_title_override'): get_the_title(); ?></h3>
                        <div class="text-default text-uppercase"><?php print get_field('card_subtext'); ?></div>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_query(); ?>
        </div> 
    </div>
<?php endif; ?>