<?php 
$products = get_sub_field('products'); 
$hide_gustavus = get_sub_field('hide_gustavus');
?>

<div class="container">
    <div class="row <?php if($hide_gustavus): print 'justify-content-center'; endif; ?>">
        <div class="<?php if($hide_gustavus): print 'col-12 col-lg-10'; else: print 'col-lg-9 offset-lg-3'; endif; ?>">
            <?php print get_sub_field('content'); ?>
            <div class="product-carousel">
                <?php foreach ($products as $product): $image = get_field('product_image', $product); ?>
                <div class="product-carousel--item text-center">
                    <?php if($image): ?>
                    <div class="product-carousel--image"><img src="<?php print $image; ?>" alt="<?php print get_the_title($product); ?>" /></div>
                    <?php endif; ?>
                    <p class="text-white"><?php print get_the_title($product); ?></p>
                    <!-- <a href="<?php print get_the_permalink($product); ?>" class="btn btn-outline-white">View Product</a> -->
                </div>
                <?php endforeach; ?>   
            </div>
        </div>
    </div>
    <?php if(!$hide_gustavus): ?><div class="gustavus"><img src="/wp-content/themes/swift/assets/img/stav_right_1.png" /></div><?php endif; ?>
</div>
