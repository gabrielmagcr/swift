<?php
function print_active()
{
    if (empty(get_sub_field('taxonomy_filter'))) print 'active';
}
?>


<div class="tabbed-carousel-dropdown dropdown" v-cloak>
    <div class="dropdown-toggle" data-toggle="dropdown">
        <?php while (have_rows('slides')) : the_row(); ?>
        <div v-if="activeIndex == <?php print get_row_index(); ?>">
           <span><?php print get_sub_field('tab_title'); ?></span>
        </div>
        <?php endwhile; ?>
    </div>

    <div class="dropdown-menu">
        <?php while (have_rows('slides')) : the_row(); ?>
        <a href="#" class="dropdown-item" :class="[{ 'active': activeIndex == <?php print get_row_index(); ?> }]" @click.prevent="selectTab('<?php print get_row_index(); ?>')">
            <span><?php print get_sub_field('tab_title'); ?></span>
        </a>
        <?php endwhile; ?>
    </div>
</div>


<div class="tabbed-carousel" data-default-index="<?php print get_sub_field('default_index'); ?>">
    <transition name="fade">
        <div class="tabbed-carousel--loader" v-if="loading"></div>
    </transition>
    
    <div class="tabbed-carousel--content">
        <?php while (have_rows('slides')) : the_row(); ?>
            <?php $image = get_sub_field('image'); ?>
            <div v-show="activeIndex == <?php print get_row_index(); ?>" :class="['tabbed-carousel--tab-content']" data-tab-index="<?php print get_row_index(); ?>">
                <div class="tab-content--content"><?php print get_sub_field('content'); ?></div>
                <div class="tab-content--bg" style="background: url('<?php if ($image) print $image['url']; ?>') no-repeat center / cover;"></div>
            </div>
        <?php endwhile; ?>

        <a href="#" class="tabbed-carousel--next" @click.prevent="prevTab()" title="Previous">
            <img src="/wp-content/themes/swift/assets/img/chevron-up-sharp-regular.svg" />
        </a>
        <a href="#" class="tabbed-carousel--prev" @click.prevent="nextTab()" title="Next">
        <img src="/wp-content/themes/swift/assets/img/chevron-down-sharp-regular.svg" />
        </a>
    </div>
    <div class="tabbed-carousel--tabs">
        <?php while (have_rows('slides')) : the_row(); ?>
            <div :class="['tabbed-carousel--tab', { 'active': activeIndex == <?php print get_row_index(); ?> }]" @click.prevent="selectTab('<?php print get_row_index(); ?>')" data-index="<?php print get_row_index(); ?>" data-taxonomy-id="<?php print get_sub_field('taxonomy_filter'); ?>">
                <span><?php print get_sub_field('tab_title'); ?></span>
            </div>
        <?php endwhile; ?>
    </div>
</div>