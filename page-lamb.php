<?php 
/* 
 Template Name: page-lamb
 */
    get_header(); 
    $thumb = get_the_post_thumbnail_url('full');
?>
<section id="veal-hero" style="background-image: url(<?=the_post_thumbnail_url('full');?>);">
</section>
<!-- /#products-hero -->
<div class="clearfix"></div>
<section id="veal-our-story">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <?php the_content();?>
            </div>
            <!-- /.col-lg-6 col-12 -->
            <div class="col-lg-6 col-12">
                <img src="<?=the_field('about_us_image');?>" alt="<?php the_title();?>">
            </div>
            <!-- /.col-lg-6 col-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /#veal-our-story -->
<section id="filter-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Swift Lamb Products</h2>
                <p>Swift takes pride in sourcing its lamb from Australia, where livestock are raised naturally, humanely, and held to rigorous animal welfare standards. Swift Lamb delivers a consistently palatable eating quality and texture. Australian lamb has a subtle flavor and is lean and tender, resulting from natural raising methods and early harvesting.</p>
                <p>Swift Lamb is a deliciously healthy choice for meeting high-quality protein needs without sacrificing taste. When creating your meal plans, Swift Lamb is a satisfying solution to a wholesome, balanced meal for you and your family.</p>
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /#filter-wrap -->
<section id="veal-products-wrap">
    <div class="container">
        <div class="row">
            <?php
                // WP_Query arguments
                $args = array(
                    'post_type'              => 'products',
                    'posts_per_page' => -1,
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                    'meta_key' => 'type',
                    'meta_value' => 'lamb',
                    'meta_compare' => 'IN'

                );

                // The Query
                $query = new WP_Query( $args );
                // $i = 0;

                // The Loop
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        if(get_field('cooking_methods')) {
                            $cmethods = get_field('cooking_methods');
                            $methods = implode(' ', $cmethods);
                        }                        
            ?>
                     
            <div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 product-item all <?= the_field('type');?> <?= $methods;?>">
                <div class="pi-top" style="background-image: url('<?=the_field("thumbnail_image");?>');">
                    <div class="title-wrap">
                        <div class="title">
                            <?php the_title();?>
                        </div>
                        <!-- /.title -->
                        <div class="pi-arrow"><img src="<?= get_template_directory_uri();?>/assets/img/products/arrow-down.png" alt="Open"></div>
                        <!-- /.pi-arrow -->
                    </div>
                    <!-- /.title-wrap -->
                </div>
                <!-- /.pi-top -->
                <div class="pi-bottom">
                    <?php if(get_field('cut_image')) { ?>
                        <img src="<?=the_field("cut_image");?>" alt="<?php the_title();?>" class="pi-cut-img">
                    <?php } ?>
                    <?php if(get_field('product_description')) { ?>
                        <p><?=the_field("product_description");?></p>
                    <?php } ?>
                    
                    <?php if(have_rows('variation_images')) { ?>
                        <div class="variation-carousel">
                            <?php while( have_rows('variation_images') ): the_row(); ?>
                                <div class="carousel-cell">
                                    <img src="<?= the_sub_field('image');?>" alt="Variation">
                                </div>
                                <!-- /.carousel-cell -->
                            <?php endwhile;?>
                        </div>
                        <!-- /.variation-carousel -->
                    <?php } else { ?>
                        <?php if(get_field('product_image')) { ?>
                            <img src="<?=the_field("product_image");?>" alt="<?php the_title();?>" class="pi-product-img">
                        <?php } ?>
                    <?php } ?>
                    <?php if(get_field('also_available_in')) { ?>
                        <p>Available in:<?=the_field("also_available_in");?></p>
                        <!-- /.ingredients-list -->
                    <?php } ?>
                    <?php if(get_field('ingredients')) { ?>
                        <p class="ing-list">
                            <span>Ingredients:</span> <?=the_field("ingredients");?> 
                        </p>
                        <!-- /.ingredients-list -->
                    <?php } ?>
                    <?php if(get_field('allergens')) { ?>
                        <p class="ing-list">
                            <span>Allergens:</span> <?=the_field("allergens");?> 
                        </p>
                        <!-- /.ingredients-list -->
                    <?php } ?>
                    <?php if(get_field('nutrition_facts')) { ?>
                        <img class="pi-ingredients" src="<?=the_field("nutrition_facts");?>" alt="Nutrition Facts">
                    <?php } ?>
                    <?php if(get_field('image_source')) { ?>
                        <div class="product-img-cite"><?= the_field('image_source');?></div>
                    <?php } ?>
                    <!-- /.product-img-cite -->
                    <?php if(get_field('has_product_page') == 1) { ?>
                        <a class="product-link" href="<?php the_permalink();?>">Read More</a>
                    <?php } ?>
                </div>
                <!-- /.pi-bottom -->
            </div>
            <!-- /.col-lg-6 col-sm-12 col-xs-12 col-md-6 -->
            <?php   
                } 
                    } else {
                        echo "No products";
                    }

                // Restore original Post Data
                wp_reset_postdata();
            ?>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /#products-wrap -->
<?php if( have_rows('lamb_page_next_level') ): ?>
<?php $i=0;?>
<section id="product-next-level">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 col-xs-12">
                <h3>Take your Meal to the Next Level</h3>
            </div>
            <!-- /.col-xl-12 col-lg-12 col-md-12 col-12 col-xs-12 -->
        </div>
        <!-- /.row -->
        <div class="nextlevel-carousel">
            <?php while( have_rows('lamb_page_next_level') ): the_row(); ?>
                <?php  
                    $image = get_sub_field('image');
                    $prep_time = get_sub_field('preparation_time');
                    $servings = get_sub_field('servings');
                    $image_source = get_sub_field('image_source');
                    $recipe_source = get_sub_field('recipe_source');
                ?>
                <div class="col-xl-4 col-lg-4 col-md-4 col-12 col-xs-12 product-other-item carousel-cell" data-toggle="modal" data-target="#tip-<?= $i;?>">
                    <div class="inner" style="background-image: url(<?= $image;?>);">
                        <div class="veal-overlay"></div>
                        <div class="tip-headline">
                            <h3><?=the_sub_field('title');?> </h3>
                        </div>
                        <!-- /.tip-headline -->
                    </div> 
                    <!-- /.inner -->
                </div>
                <!-- /.col-xl-4 col-lg-4 col-md-4 col-12 col-xs-12 -->
                    <!-- ===== END RECIPE TYPE ===== -->
                    <?php $i++;?>
            <?php endwhile; ?>
        </div>
    </div>
    <!-- /.container -->
</section>
<!-- /#product-next-level -->
<?php endif; ?>

<?php if( have_rows('lamb_page_next_level') ): ?>
<?php $i=0;?>
<?php while( have_rows('lamb_page_next_level') ): the_row(); ?>
<?php  
    $image = get_sub_field('image');
    $prep_time = get_sub_field('preparation_time');
    $servings = get_sub_field('servings');
    $image_source = get_sub_field('image_source');
    $recipe_source = get_sub_field('recipe_source');
?>
<div class="modal fade tips-modal" tabindex="-1" role="dialog" id="tip-<?= $i;?>">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><img src="<?=get_template_directory_uri();?>/assets/img/close.png" alt="Close button"></span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container">
            <div class="row">
                <div class="col-12">
                <div class="modal-content-wrap">
                    <h2><?=the_sub_field('title');?></h2>
                    <p class="timing-info"><?=the_sub_field('number_of_ingredients');?> ingredients<?php if($prep_time != "") { echo ", {$prep_time}";}?><?php if($servings != "") { echo ", Servings: {$servings}"; } ?> </p>

                    <img class="recipe-img" src="<?=$image;?>" alt="<?=$title;?>">


                    <?php if($image_source != "") { ?>
                        <div class="cite image-cite"><?=$image_source;?></div>
                    <?php } ?>

                    <div class="recipe-content-wrap">
                        <?=the_sub_field('recipe_content');?>
                    </div>
                    <!-- /.recipe-content-wrap -->
                    <?php if($recipe_source != "") { ?>
                        <div class="cite">Source: <?= $recipe_source;?></div>
                    <!-- /.cite -->
                    <?php } ?>
                </div>
                <!-- /.modal-content-wrap -->
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        </div>
    </div>
</div>

<?php $i++;?>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>