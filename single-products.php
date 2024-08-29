<?php

/**
 * The template for displaying all single posts and attachments
 */
get_header();
the_post(); ?>

<style>
    .second-card-video {
        position: relative;
        width: 100%;
        height: 100%;
    }
    .play-btn{
        position: absolute;
    top: 50%;
    left: 50%;
    width: 75px; 
    transform: translate(-50%, -50%);
    cursor: pointer;
    z-index: 10; 
    }
    .video-container video {
    display: block;
    width: 100%;
    height: auto;
}  
@media (min-width:767px) {
    .play-btn{
        width: 100px;
    }
}
    
</style>

<section class="sm-prodhero">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-xs-12 sm-prodhero--info">
                <div class="sm-prodhero--cut-img">
                    <?php if (get_field('cut_image')) { ?>
                        <img src="<?php echo esc_url(get_field('cut_image')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                    <?php } ?>
                </div>
                <div class="sm-prodhero--breadcrumb">
                    <ol>
                        <li><a href="/products">Products</a></li>
                        <li><?php the_title(); ?></li>
                    </ol>
                </div>
                <h1><?php the_title(); ?></h1>
                <p><?= the_field('product_description'); ?></p>
                <form class="sm-prodhero--wtb" action="/store-locator" method="GET">
                    <button class="btn btn-outline-red" type="submit">Where to Buy</button>
                </form>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-xs-12 sm-prodhero--img">
                <figure>
                    <img src="<?= the_field("product_image"); ?>" alt="<?php the_title(); ?> in packaging">
                </figure>
            </div>
        </div>
    </div>
</section>

<section class="sm-badgebar">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-xs-12">
                <h3><span>0</span> Artificial Ingredients</h3>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-xs-12">
                <?php get_template_part('parts/badges'); ?>
            </div>
        </div>
    </div>
</section>


<?php
/*
* the_field('product_page_hero_image');
*/
?>


<?php $add_cooking_method = get_field('add_cooking_method');
$cooking_methods = get_field('cooking_methods'); ?>
<?php if ($add_cooking_method) : ?>
    <section id="up-your-game" class="single-how-to-cook">
        <div class="container">


            <div class="row">
                <div class="col-12">
                    <div class="game-nav sm-product-cook-tabs">
                        <?php
                        $count = 0;
                        foreach ($cooking_methods as $key => $value) {
                            $term = $value;
                        ?>
                            <button class="gn-item <?php if ($count == 0) {
                                                        echo 'active first-item';
                                                    } ?> left-target" data-target="#hm-<?= $term; ?>">
                                <?= $term = ($term == 'sousvide') ? "Sous vide" : $term; ?>
                            </button>
                            <!-- /.gn-item -->
                            <?php $count++; ?>
                        <?php  }  ?>
                    </div>
                    <!-- /.game-nav -->
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>


    <section id="product-game-target">
        <div class="container pgt-media">
            <?php if (in_array("grill", $cooking_methods)) { ?>
                <div id="hm-grill" class="pgt-cards row">
                    <div class="pgt-card first-card">
                        <h3>
                            <?php
                            $title = get_field('roast_content_title');
                            echo $title ? $title : 'Roast';
                            ?></h3>
                        <?php the_field('grilling_content'); ?>
                        <?php if (get_field('grill_recipe')) {
                            $item_id = get_field('grill_recipe');
                            $rlink = get_post_permalink($item_id);
                        ?>
                            <a href="<?= $rlink; ?>" class="gold-btn-recipe" target="_blank">View Recipe</a>
                        <?php } ?>
                    </div>
                    <!-- /.pgt-card first-card -->
                    <div class="pgt-card second-card ">
                        <?php if (get_field('grill_video')) { ?>
                            <video poster="<?= the_field('grilling_image'); ?>" preload="none" width="100%" height="300" controls style="object-fit:cover;">
                                <source src="<?= the_field('grill_video'); ?>" type="video/mp4">
                            </video>
                        <?php } else { ?>
                            <div class="second-card-img" style="
                            background-image: url('<?php the_field('grilling_image'); ?>');
                            ">
                            </div>
                        <?php } ?>
                    </div>
                    <!-- /.col-xl-6 col-lg-6 col-md-6 col-12 col-xs-12 -->
                </div>
                <!-- /.pgt-cards row -->
            <?php } ?>

            <?php if ((in_array("sear", $cooking_methods))) {  ?>
                <div id="hm-sear" class="pgt-cards row">
                    <div class="pgt-card first-card">
                        <h3>
                            <?php
                            $title = get_field('sear');
                            echo $title ? $title : 'Sear';
                            ?></h3>
                        <?php the_field('sear_content'); ?>
                        <?php if (get_field('sear_recipe')) {
                            $item_id = get_field('sear_recipe');
                            $rlink = get_post_permalink($item_id);
                        ?>
                            <a href="<?= $rlink; ?>" class="gold-btn-recipe" target="_blank">View Recipe</a>
                        <?php } ?>
                    </div>
                    <!-- /.pgt-card first-card -->
                    <div class="pgt-card second-card">
                        <?php if (get_field('sear_video')) { ?>

                                <video poster="<?= the_field('sear_image'); ?>" preload="none" width="100%" height="300" controls style="object-fit:cover;">
                                    <source src="<?= the_field('sear_video'); ?>" type="video/mp4">   
                                </video> 
                        <?php } else { ?>
                            <div class="second-card-img" style="
                            background-image: url('<?php the_field('sear_image'); ?>');
                            ">
                            </div>

                        <?php } ?>
                    </div>
                    <!-- pgt-card second-card -->
                </div>
                <!-- /.pgt-cards row -->
            <?php } ?>

            <?php if (in_array("roast", $cooking_methods)) { ?>
                <div id="hm-roast" class="pgt-cards row">
                    <div class="pgt-card first-card">
                        <h3><?php
                            $title = get_field('grilling_content_title');
                            echo $title ? $title : 'Grilling';
                            ?></h3>
                        <?php the_field('roast_content'); ?>
                        <?php if (get_field('roast_recipe')) {
                            $item_id = get_field('roast_recipe');
                            $rlink = get_post_permalink($item_id);
                        ?>
                            <a href="<?= $rlink; ?>" class="gold-btn-recipe" target="_blank">Make this Recipe</a>
                        <?php } ?>
                    </div>
                    <!-- pgt-card first-card -->
                    <div class="pgt-card second-card">
                        <?php if (get_field('roast_video')) { ?>
                            <video poster="<?= the_field('roast_image'); ?>" preload="none" width="100%" height="300" controls style="object-fit:cover;">
                                <source src="<?= the_field('roast_video'); ?>" type="video/mp4">
                            </video>
                        <?php } else { ?>
                            <div class="second-card-img" style="
                            background-image: url('<?php the_field('roast_image'); ?>');
                            ">
                            </div>
                        <?php } ?>
                    </div>
                    <!-- pgt-card second-card -->
                </div>
                <!-- /.pgt-cards row -->
            <?php } ?>

            <?php if ((in_array("smoke", $cooking_methods))) { ?>
                <div id="hm-smoke" class="pgt-cards row">
                    <div class="pgt-card first-card">
                        <h3>
                            <?php
                            $title = get_field('smoke_content_title');
                            echo $title ? $title : 'Smoke';
                            ?></h3>
                        <?php the_field('smoke_content'); ?>
                        <?php if (get_field('smoke_recipe')) {
                            $item_id = get_field('smoke_recipe');
                            $rlink = get_post_permalink($item_id);
                        ?>
                            <a href="<?= $rlink; ?>" class="gold-btn-recipe" target="_blank">View Recipe</a>
                        <?php } ?>
                    </div>
                    <!-- pgt-card first-card -->
                    <div class="pgt-card second-card ">
                        <?php if (get_field('smoke_video')) { ?>
                            <video poster="<?= the_field('smoke_image'); ?>" preload="none" width="100%" height="300" controls style="object-fit:cover;">
                                <source src="<?= the_field('smoke_video'); ?>" type="video/mp4">
                            </video>
                        <?php } else { ?>
                            <div class="second-card-img" style="
                            background-image: url('<?php the_field('smoke_image'); ?>');
                            ">
                            </div>
                        <?php } ?>
                    </div>
                    <!-- pgt-card second-card -->
                </div>
                <!-- /.pgt-cards row -->
            <?php } ?>

            <?php if ((in_array("braise", $cooking_methods))) { ?>
                <div id="hm-braise" class="pgt-cards row">
                    <div class="pgt-card first-card">
                        <h3> <?php
                                $title = get_field('braise');
                                echo $title ? $title : 'Braise';
                                ?></h3>
                        <?php the_field('braise_content'); ?>
                        <?php if (get_field('braise_recipe')) {
                            $item_id = get_field('braise_recipe');
                            $rlink = get_post_permalink($item_id);
                        ?>
                            <a href="<?= $rlink; ?>" class="gold-btn-recipe" target="_blank">View Recipe</a>
                        <?php } ?>
                    </div>
                    <!-- /.pgt-card first-card -->
                    <div class="pgt-card second-card ">
                        <?php if (get_field('braise_video')) { ?>
                            <video poster="<?= the_field('braise_image'); ?>" preload="none" width="100%" height="300" controls style="object-fit:cover;">
                                <source src="<?= the_field('braise_video'); ?>" type="video/mp4">
                            </video>
                        <?php } else { ?>
                            <div class="second-card-img" style="
                            background-image: url('<?php the_field('braise_image'); ?>');
                            ">
                            </div>
                        <?php } ?>
                    </div>
                    <!-- /.pgt-card second-card -->
                </div>
                <!-- /.pgt-cards row -->
            <?php } ?>

            <?php if ((in_array("sousvide", $cooking_methods))) { ?>
                <div id="hm-sousvide" class="pgt-cards row">
                    <div class="pgt-card first-card">
                        <h3> <?php
                                $title = get_field('sous_vide_content_title');
                                echo $title ? $title : 'Sour Vide';
                                ?></h3>
                        <?php the_field('sous_vide_content'); ?>
                        <?php if (get_field('sous_vide_recipe')) {
                            $item_id = get_field('sous_vide_recipe');
                            $rlink = get_post_permalink($item_id);
                        ?>
                            <a href="<?= $rlink; ?>" class="gold-btn-recipe" target="_blank">View Recipe</a>
                        <?php } ?>
                    </div>
                    <!-- /.pgt-card first-card -->
                    <div class="pgt-card second-card ">
                        <?php if (get_field('sousvide_video')) { ?>
                            <video poster="<?= the_field('sous_vide_image'); ?>" preload="none" width="100%" height="300" controls style="object-fit:cover;">
                                <source src="<?= the_field('sousvide_video'); ?>" type="video/mp4">
                            </video>
                        <?php } else { ?>
                            <div class="second-card-img" style="
                            background-image: url('<?php the_field('sous_vide_image'); ?>');
                            ">
                            </div>
                        <?php } ?>
                    </div>
                    <!-- /.pgt-card second-card -->
                </div>
                <!-- /.pgt-cards row -->
            <?php } ?>
        </div>
        <!-- /.container -->
    </section>
    <!-- /#product-game-content -->
<?php endif; ?>





<?php
/* Next level section -------------- */

if (have_rows('product_page_next_level')) : ?>
    <section id="product-next-level">
        <div class="container product-next-level-container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 col-xs-12">
                    <h3 class="sm-nextlevel-heading">Take your Meal to the Next Level</h3>
                </div>
                <!-- /.col-xl-12 col-lg-12 col-md-12 col-12 col-xs-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <?php while (have_rows('product_page_next_level')) : the_row(); ?>
                    <?php
                    $item_id = get_sub_field('recipe_video');
                    $dificulty_lvl = get_field('dificulty_level', $item_id);
                    $item = get_post($item_id);
                    $type = $item->type;
                    $thaimage = wp_get_attachment_image_src($item->image, 'full');

                    if ($thaimage != "") {
                        $image = $thaimage[0];
                    } else {
                        $image = get_template_directory_uri() . "/assets/img/tips/recipe-ex.jpg";
                    }

                    ?>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-12 col-xs-12 product-other-item" data-toggle="modal" data-target="#tip-<?= $item_id; ?>">

                        <div class="sm-nextlevel-item">
                            <figure>
                                <img src="<?= $image; ?>" alt="<?= $item->post_title; ?>">
                            </figure>
                            <div class="sm-nextlevel-item--body">
                                <?php if ($dificulty_lvl) : ?>
                                    <span>DIFICULTY LEVEL - <?= $dificulty_lvl; ?>/10</span>
                                <?php endif; ?>
                                <h3><?= $item->post_title; ?> </h3>
                            </div>
                        </div>

                    </div>
                    <!-- /.col-xl-4 col-lg-4 col-md-4 col-12 col-xs-12 -->
                    <?php //get_template_part('inc/single', 'modals');
                    ?>
                    <?php if ($type == 'recipe') { ?>
                        <div class="modal fade tips-modal" tabindex="-1" role="dialog" id="tip-<?= $item_id; ?>" data-title="<?= $item->post_title; ?>" data-id="<?= $item_id; ?>" data-path="<?= $item->post_name; ?>">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><img src="<?= get_template_directory_uri(); ?>/assets/img/close.png" alt="Close button"></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="modal-content-wrap">
                                                        <h2><?= $item->post_title; ?></h2>
                                                        <p class="timing-info"><?= $item->number_of_ingredients; ?> ingredients<?php if ($item->preparation_time != "") {
                                                                                                                                    echo ", {$item->preparation_time}";
                                                                                                                                } ?><?php if ($item->servings != "") {
                                                                                                                                        echo ", Servings: {$item->servings}";
                                                                                                                                    } ?> </p>
                                                        <?php if ($item->video != "") { ?>
                                                            <video width="100%" height="auto" controls>
                                                                <source src="<?= $item->video; ?>" type="video/mp4">
                                                                <!-- <source src="movie.ogg" type="video/ogg">-->
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        <?php } else { ?>
                                                            <?php if ($item->image != "") { ?>
                                                                <img class="recipe-img" src="<?= $image; ?>" alt="<?= $item->post_title; ?>">
                                                            <?php } else { ?>
                                                                <img class="recipe-img" src="<?= get_template_directory_uri(); ?>/assets/img/recipe-img.jpg" alt="<?= $item->post_title; ?>">
                                                            <?php } ?>
                                                        <?php } ?>
                                                        <?php if ($item->image_source != "") { ?>
                                                            <div class="cite image-cite"><?= $item->image_source; ?></div>
                                                        <?php } ?>

                                                        <div class="recipe-content-wrap">
                                                            <?= $item->content; ?>
                                                        </div>
                                                        <!-- /.recipe-content-wrap -->
                                                        <?php if ($item->recipe_source != "") { ?>
                                                            <div class="cite">Source: <?= $item->recipe_source; ?></div>
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
                        <!-- ===== END RECIPE TYPE ===== -->

                    <?php } elseif ($type == 'graphic') { ?>
                        <!-- ===== GRAPHIC TYPE ===== -->
                        <div class="modal fade tips-modal" tabindex="-1" role="dialog" id="tip-<?= $item->post_id; ?>" data-title="<?= $item->post_title; ?>" data-id="<?= $item_id; ?>" data-path="<?= $item->post_name; ?>">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><img src="<?= get_template_directory_uri(); ?>/assets/img/close.png" alt="Close button"></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="modal-content-wrap">
                                                        <img src="<?= $image; ?>" alt="<?= $item->post_title; ?>">
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
                        <!-- ===== END GRAPHIC TYPE ===== -->
                    <?php } elseif ($type == 'image') { ?>
                        <!-- ===== IMAGE TYPE ===== -->
                        <div class="modal fade tips-modal" tabindex="-1" role="dialog" id="tip-<?= $item->post_id; ?>" data-title="<?= $item->post_title; ?>" data-id="<?= $item_id; ?>" data-path="<?= $item->post_name; ?>">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><img src="<?= get_template_directory_uri(); ?>/assets/img/close.png" alt="Close button"></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="modal-content-wrap">
                                                        <img src="<?= $image; ?>" alt="<?= $item->post_title; ?>">
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
                        <!-- ===== END IMAGE TYPE ===== -->
                    <?php } elseif ($type == 'video') { ?>
                        <!-- ===== VIDEO TYPE ===== -->
                        <div class="modal fade tips-modal" tabindex="-1" role="dialog" id="tip-<?= $item->ID; ?>" data-title="<?= $item->post_title; ?>" data-id="<?= $item_id; ?>" data-path="<?= $item->post_name; ?>">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><img src="<?= get_template_directory_uri(); ?>/assets/img/close.png" alt="Close button"></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="modal-content-wrap">
                                                        <video width="100%" height="auto" controls>
                                                            <source src="<?= $item->video; ?>" type="video/mp4">
                                                            <!-- <source src="movie.ogg" type="video/ogg">-->
                                                            Your browser does not support the video tag.
                                                        </video>
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
                        <!-- ===== END IMAGE TYPE ===== -->
                    <?php } ?>

                <?php endwhile; ?>
            </div>
        </div>
        <a href="/tips-recipes"><button class="blue-btn">VIEW MORE RECIPES</button></a>

        <!-- /.container -->
    </section>
    <!-- /#product-next-level -->
<?php endif; ?>



<section class="sm-prod-nutrition">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="sm-products--view-more">
                    <button data-toggle="sm-prod-nutrition-info">
                        <span>Nutrition & Ingredients</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16" viewBox="0 0 30 16" fill="none">
                            <g clip-path="url(#clip0_350_1057)">
                                <path d="M27.4366 0L14.9936 12.443L2.55051 0L0.77832 1.77219L13.2214 14.2152L14.9936 16L29.2214 1.77219L27.4366 0Z" fill="#28334A" />
                            </g>
                            <defs>
                                <clipPath id="clip0_350_1057">
                                    <rect width="28.443" height="16" fill="white" transform="translate(0.77832)" />
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <div id="sm-prod-nutrition-info" class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-xs-12 product-nutrition">
                <?php if (get_field('nutrition_facts')) { ?>
                    <img src="<?php echo esc_url(get_field('nutrition_facts')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                <?php } ?>
            </div>
            <!-- /.col-xl-6 col-lg-6 col-md-6 col-12 col-xs-12 -->
            <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-xs-12 single-allergens">
             
                <?php echo get_field('highlights') ?  get_field('ingredients') : ''; ?> <br>
                <?php echo get_field('ingredients') ? '<span>INGREDIENTS: </span>' . get_field('ingredients') : ''; ?> <br>
                <?php echo get_field('allergens') ? '<span>ALLERGENS: </span>' . get_field('ingredients') : ''; ?> 
            </div>
            <!-- /.col-xl-6 col-lg-6 col-md-6 col-12 col-xs-12 -->
        </div>

    </div>
</section>



<?php
get_template_part('parts/pre-footer-ctas');


get_footer();
