<?php if(have_rows('cards')): ?>
<?php while(have_rows('cards')): the_row(); $link = get_sub_field('link'); ?>
<div class="card--full">
    <a href="<?php print $link['url']; ?>" class="stretched-link"></a>
    <div class="card-content">
        <h3><?php print $link['title']; ?></h3>
    </div>
    <div class="card-bg" style="background: url('<?php print get_sub_field('image')['url']; ?>') no-repeat center / cover;"></div>
</div>
</div>
<?php endwhile; ?>
<?php endif; ?>