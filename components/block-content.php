<?php
$use_container = get_sub_field('container') == 'contained';
?>

<?php if ($use_container) : ?><div class="container"><?php endif; ?>
    <?php print get_sub_field('content'); ?>
<?php if ($use_container) : ?></div><?php endif; ?>