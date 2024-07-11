

<?php if(have_rows('blocks')): ?>
<?php while(have_rows('blocks')): the_row(); ?>

<?php
    $block_id = 'block-' . get_row_index();
    $layout = get_row_layout();
    $classes = [
        'block', 
        "block-{$layout}"
    ];

    if($padding = get_sub_field('padding') && !in_array($layout, ['card-links', 'activation-category-carousel'])) {
        switch($padding) {
            case 'normal':
                $classes[] = 'padded';
                break;
            case 'inner':
                $classes[] = 'padded-inner';
                break;
        }
    }

    if($addtl_classes = get_sub_field('additional_classes')) {
        $classes = array_merge($classes, explode(' ', $addtl_classes));
    }

    if($bg_color = get_sub_field('background_color')) {
        $classes[] = "bg-{$bg_color}";
    }

    if(get_sub_field('enable_background_gradient')) {
        $classes[] = "enable-gradient";
    }

    if(get_sub_field('hide_gustavus')) {
        $classes[] = 'hide-gustavus';
    }

    $styles = [];

    if($bg_image = get_sub_field('background_image')) {
        $styles[] = "--block-background-image: url('{$bg_image['url']}')";
        $classes[] = 'has-background-image';
        // $styles[] = "background: url('') no-repeat center / cover;";
    }

    if($bg_image = get_sub_field('background_image_mobile')) {
        $styles[] = "--block-background-image-mobile: url('{$bg_image['url']}')";
        $classes[] = 'has-background-image-mobile';
        // $styles[] = "background: url('') no-repeat center / cover;";
    }

    if($bg_video = get_sub_field('background_video')) {
        $classes[] = 'has-video-bg';
    }

?>
<section class="<?php print join(' ', $classes); ?>" id="<?php print $block_id;?>" style="<?php print join(';', $styles); ?>">

<?php get_template_part('components/block', $layout); ?>

<?php if($bg_video): ?>
<video class="block--video-bg" poster="<?php print $bg_image ? $bg_image['url'] : ''; ?>" loop muted autoplay playsinline>
<?php foreach($bg_video as $video): ?>
    <source type="<?php print $video['mime_type']; ?>" src="<?php print $video['url']; ?>" />
<?php endforeach; ?>
</video>
<?php endif; ?>

</section>


<?php endwhile; ?>
<?php endif; ?>