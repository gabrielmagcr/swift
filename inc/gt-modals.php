<?php
    $sear1_post = get_field('sear_1', 5);

    // WP_Query arguments
    $args1 = array(
        'post_type' => 'tips',
        'p'                      => $sear1_post,
    );
    // The Query
    $sear1_query = new WP_Query( $args1 );
    // The Loop
    while ( $sear1_query->have_posts() ) {
    $sear1_query->the_post();
?>

    <div class="modal fade tips-modal" tabindex="-1" role="dialog" id="sear-1">
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
                        <h2><?php the_title();?></h2>
                        <p class="timing-info"><?= the_field('number_of_ingredients');?> ingredients, <?= the_field('preparation_time');?>, Servings: <?= the_field('servings');?> </p>
                        <?php if(get_field('image')) { ?>
                            <img class="recipe-img" src="<?= the_field('image');?>" alt="<?php the_title();?>">
                        <?php } else { ?>
                            <img class="recipe-img" src="<?=get_template_directory_uri();?>/assets/img/recipe-img.jpg" alt="<?php the_title();?>">
                        <?php } ?>
                        <?php if(get_field('image_source')) { ?>
                            <div class="cite image-cite"><?php the_field('image_source');?></div>
                        <?php } ?>

                        <div class="recipe-content-wrap">
                            <?= the_field('content');?>
                        </div>
                        <!-- /.recipe-content-wrap -->
                        <?php if(get_field('recipe_source')) { ?>
                            <div class="cite">Source: <?= the_field('recipe_source');?></div>
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

<?php
}
// Restore original Post Data
wp_reset_postdata();
?>

<!-- ========== END SEAR 1 ========== -->

<!-- ========== SEAR 2 ========== -->
<?php
    $sear2_post = get_field('sear_2', 5);

    // WP_Query arguments
    $args2 = array(
        'post_type' => 'tips',
        'p'                      => $sear2_post,
        'status' => 'published'
    );

    // The Query
    $sear2_query = new WP_Query( $args2 );
    // The Loop
    while ( $sear2_query->have_posts() ) {
    $sear2_query->the_post();
?>

    <div class="modal fade tips-modal" tabindex="-1" role="dialog" id="sear-2">
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
                        <h2><?php the_title();?></h2>
                        <p class="timing-info"><?= the_field('number_of_ingredients');?> ingredients, <?= the_field('preparation_time');?>, Servings: <?= the_field('servings');?> </p>
                        <?php if(get_field('image')) { ?>
                            <img class="recipe-img" src="<?= the_field('image');?>" alt="<?php the_title();?>">
                        <?php } else { ?>
                            <img class="recipe-img" src="<?=get_template_directory_uri();?>/assets/img/recipe-img.jpg" alt="<?php the_title();?>">
                        <?php } ?>
                        <?php if(get_field('image_source')) { ?>
                            <div class="cite image-cite"><?php the_field('image_source');?></div>
                        <?php } ?>

                        <div class="recipe-content-wrap">
                            <?= the_field('content');?>
                        </div>
                        <!-- /.recipe-content-wrap -->
                        <?php if(get_field('recipe_source')) { ?>
                            <div class="cite">Source: <?= the_field('recipe_source');?></div>
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

<?php
}
// Restore original Post Data
wp_reset_postdata();
?>
<!-- ========== END SEAR 2 ========== -->

<!-- ========== ROAST 1 ========== -->
<?php
    $roast1_post = get_field('roast_1', 5);

    // WP_Query arguments
    $args3 = array(
        'post_type' => 'tips',
        'p'                      => $roast1_post,
    );

    // The Query
    $roast1_query = new WP_Query( $args3 );
    // The Loop
    while ( $roast1_query->have_posts() ) {
    $roast1_query->the_post();
?>

    <div class="modal fade tips-modal" tabindex="-1" role="dialog" id="roast-1">
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
                        <h2><?php the_title();?></h2>
                        <p class="timing-info"><?= the_field('number_of_ingredients');?> ingredients, <?= the_field('preparation_time');?>, Servings: <?= the_field('servings');?> </p>
                        <?php if(get_field('image')) { ?>
                            <img class="recipe-img" src="<?= the_field('image');?>" alt="<?php the_title();?>">
                        <?php } else { ?>
                            <img class="recipe-img" src="<?=get_template_directory_uri();?>/assets/img/recipe-img.jpg" alt="<?php the_title();?>">
                        <?php } ?>
                        <?php if(get_field('image_source')) { ?>
                            <div class="cite image-cite"><?php the_field('image_source');?></div>
                        <?php } ?>

                        <div class="recipe-content-wrap">
                            <?= the_field('content');?>
                        </div>
                        <!-- /.recipe-content-wrap -->
                        <?php if(get_field('recipe_source')) { ?>
                            <div class="cite">Source: <?= the_field('recipe_source');?></div>
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

<?php
}
// Restore original Post Data
wp_reset_postdata();
?>
<!-- ========== END ROAST 1 ========== -->

<!-- ========== ROAST 2 ========== -->
<?php
    $roast2_post = get_field('roast_2', 5);

    // WP_Query arguments
    $args4 = array(
        'post_type' => 'tips',
        'p'                      => $roast2_post,
    );

    // The Query
    $roast2_query = new WP_Query( $args4 );
    // The Loop
    while ( $roast2_query->have_posts() ) {
    $roast2_query->the_post();
?>

    <div class="modal fade tips-modal" tabindex="-1" role="dialog" id="roast-2">
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
                        <h2><?php the_title();?></h2>
                        <p class="timing-info"><?= the_field('number_of_ingredients');?> ingredients, <?= the_field('preparation_time');?>, Servings: <?= the_field('servings');?> </p>
                        <?php if(get_field('image')) { ?>
                            <img class="recipe-img" src="<?= the_field('image');?>" alt="<?php the_title();?>">
                        <?php } else { ?>
                            <img class="recipe-img" src="<?=get_template_directory_uri();?>/assets/img/recipe-img.jpg" alt="<?php the_title();?>">
                        <?php } ?>
                        <?php if(get_field('image_source')) { ?>
                            <div class="cite image-cite"><?php the_field('image_source');?></div>
                        <?php } ?>

                        <div class="recipe-content-wrap">
                            <?= the_field('content');?>
                        </div>
                        <!-- /.recipe-content-wrap -->
                        <?php if(get_field('recipe_source')) { ?>
                            <div class="cite">Source: <?= the_field('recipe_source');?></div>
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

<?php
}
// Restore original Post Data
wp_reset_postdata();
?>
<!-- ========== END ROAST 2 ========== -->

<!-- ========== GRILL 1 ========== -->
<?php
    $grill1_post = get_field('grill_1', 5);

    // WP_Query arguments
    $args5 = array(
        'post_type' => 'tips',
        'p'                      => $grill1_post,
    );

    // The Query
    $grill1_query = new WP_Query( $args5 );
    // The Loop
    while ( $grill1_query->have_posts() ) {
    $grill1_query->the_post();
?>

    <div class="modal fade tips-modal" tabindex="-1" role="dialog" id="grill-1">
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
                        <h2><?php the_title();?></h2>
                        <p class="timing-info"><?= the_field('number_of_ingredients');?> ingredients, <?= the_field('preparation_time');?>, Servings: <?= the_field('servings');?> </p>
                        <?php if(get_field('image')) { ?>
                            <img class="recipe-img" src="<?= the_field('image');?>" alt="<?php the_title();?>">
                        <?php } else { ?>
                            <img class="recipe-img" src="<?=get_template_directory_uri();?>/assets/img/recipe-img.jpg" alt="<?php the_title();?>">
                        <?php } ?>
                        <?php if(get_field('image_source')) { ?>
                            <div class="cite image-cite"><?php the_field('image_source');?></div>
                        <?php } ?>

                        <div class="recipe-content-wrap">
                            <?= the_field('content');?>
                        </div>
                        <!-- /.recipe-content-wrap -->
                        <?php if(get_field('recipe_source')) { ?>
                            <div class="cite">Source: <?= the_field('recipe_source');?></div>
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

<?php
}
// Restore original Post Data
wp_reset_postdata();
?>
<!-- ========== END GRILL 1 ========== -->

<!-- ========== GRILL 2 ========== -->
<?php
    $grill2_post = get_field('grill_2', 5);

    // WP_Query arguments
    $args6 = array(
        'post_type' => 'tips',
        'p'                      => $grill2_post,
    );

    // The Query
    $grill2_query = new WP_Query( $args6 );
    // The Loop
    while ( $grill2_query->have_posts() ) {
    $grill2_query->the_post();
?>

    <div class="modal fade tips-modal" tabindex="-1" role="dialog" id="grill-2">
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
                        <h2><?php the_title();?></h2>
                        <p class="timing-info"><?= the_field('number_of_ingredients');?> ingredients, <?= the_field('preparation_time');?>, Servings: <?= the_field('servings');?> </p>
                        <?php if(get_field('image')) { ?>
                            <img class="recipe-img" src="<?= the_field('image');?>" alt="<?php the_title();?>">
                        <?php } else { ?>
                            <img class="recipe-img" src="<?=get_template_directory_uri();?>/assets/img/recipe-img.jpg" alt="<?php the_title();?>">
                        <?php } ?>
                        <?php if(get_field('image_source')) { ?>
                            <div class="cite image-cite"><?php the_field('image_source');?></div>
                        <?php } ?>

                        <div class="recipe-content-wrap">
                            <?= the_field('content');?>
                        </div>
                        <!-- /.recipe-content-wrap -->
                        <?php if(get_field('recipe_source')) { ?>
                            <div class="cite">Source: <?= the_field('recipe_source');?></div>
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

<?php
}
// Restore original Post Data
wp_reset_postdata();
?>
<!-- ========== END GRILL 2 ========== -->

<!-- ========== SMOKE 1 ========== -->
<?php
    $smoke1_post = get_field('smoke_1', 5);

    // WP_Query arguments
    $args7 = array(
        'post_type' => 'tips',
        'p'                      => $smoke1_post,
    );

    // The Query
    $smoke1_query = new WP_Query( $args7 );
    // The Loop
    while ( $smoke1_query->have_posts() ) {
    $smoke1_query->the_post();
?>

    <div class="modal fade tips-modal" tabindex="-1" role="dialog" id="smoke-1">
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
                        <h2><?php the_title();?></h2>
                        <p class="timing-info"><?= the_field('number_of_ingredients');?> ingredients, <?= the_field('preparation_time');?>, Servings: <?= the_field('servings');?> </p>
                        <?php if(get_field('image')) { ?>
                            <img class="recipe-img" src="<?= the_field('image');?>" alt="<?php the_title();?>">
                        <?php } else { ?>
                            <img class="recipe-img" src="<?=get_template_directory_uri();?>/assets/img/recipe-img.jpg" alt="<?php the_title();?>">
                        <?php } ?>
                        <?php if(get_field('image_source')) { ?>
                            <div class="cite image-cite"><?php the_field('image_source');?></div>
                        <?php } ?>

                        <div class="recipe-content-wrap">
                            <?= the_field('content');?>
                        </div>
                        <!-- /.recipe-content-wrap -->
                        <?php if(get_field('recipe_source')) { ?>
                            <div class="cite">Source: <?= the_field('recipe_source');?></div>
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

<?php
}
// Restore original Post Data
wp_reset_postdata();
?>
<!-- ========== END SMOKE 1 ========== -->

<!-- ========== SMOKE 2 ========== -->
<?php
    $smoke2_post = get_field('smoke_2', 5);

    // WP_Query arguments
    $args8 = array(
        'post_type' => 'tips',
        'p'                      => $smoke2_post,
        'status' => 'published'
    );

    // The Query
    $smoke2_query = new WP_Query( $args8 );
    // The Loop
    while ( $smoke2_query->have_posts() ) {
    $smoke2_query->the_post();
?>

    <div class="modal fade tips-modal" tabindex="-1" role="dialog" id="smoke-2">
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
                        <h2><?php the_title();?></h2>
                        <p class="timing-info"><?= the_field('number_of_ingredients');?> ingredients, <?= the_field('preparation_time');?>, Servings: <?= the_field('servings');?> </p>
                        <?php if(get_field('image')) { ?>
                            <img class="recipe-img" src="<?= the_field('image');?>" alt="<?php the_title();?>">
                        <?php } else { ?>
                            <img class="recipe-img" src="<?=get_template_directory_uri();?>/assets/img/recipe-img.jpg" alt="<?php the_title();?>">
                        <?php } ?>
                        <?php if(get_field('image_source')) { ?>
                            <div class="cite image-cite"><?php the_field('image_source');?></div>
                        <?php } ?>

                        <div class="recipe-content-wrap">
                            <?= the_field('content');?>
                        </div>
                        <!-- /.recipe-content-wrap -->
                        <?php if(get_field('recipe_source')) { ?>
                            <div class="cite">Source: <?= the_field('recipe_source');?></div>
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

<?php
}
// Restore original Post Data
wp_reset_postdata();
?>
<!-- ========== END SMOKE 2 ========== -->

<!-- ========== BRAISE 1 ========== -->
<?php
    $braise1_post = get_field('braise_1', 5);

    // WP_Query arguments
    $args9 = array(
        'post_type' => 'tips',
        'p'                      => $braise1_post,
    );

    // The Query
    $braise1_query = new WP_Query( $args9 );
    // The Loop
    while ( $braise1_query->have_posts() ) {
    $braise1_query->the_post();
?>

    <div class="modal fade tips-modal" tabindex="-1" role="dialog" id="braise-1">
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
                        <h2><?php the_title();?></h2>
                        <p class="timing-info"><?= the_field('number_of_ingredients');?> ingredients, <?= the_field('preparation_time');?>, Servings: <?= the_field('servings');?> </p>
                        <?php if(get_field('image')) { ?>
                            <img class="recipe-img" src="<?= the_field('image');?>" alt="<?php the_title();?>">
                        <?php } else { ?>
                            <img class="recipe-img" src="<?=get_template_directory_uri();?>/assets/img/recipe-img.jpg" alt="<?php the_title();?>">
                        <?php } ?>
                        <?php if(get_field('image_source')) { ?>
                            <div class="cite image-cite"><?php the_field('image_source');?></div>
                        <?php } ?>

                        <div class="recipe-content-wrap">
                            <?= the_field('content');?>
                        </div>
                        <!-- /.recipe-content-wrap -->
                        <?php if(get_field('recipe_source')) { ?>
                            <div class="cite">Source: <?= the_field('recipe_source');?></div>
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

<?php
}
// Restore original Post Data
wp_reset_postdata();
?>
<!-- ========== END BRAISE 1 ========== -->

<!-- ========== BRAISE 2 ========== -->
<?php
    $braise2_post = get_field('braise_2', 5);

    // WP_Query arguments
    $args10 = array(
        'post_type' => 'tips',
        'p'                      => $braise2_post,
    );

    // The Query
    $braise2_query = new WP_Query( $args10 );
    // The Loop
    while ( $braise2_query->have_posts() ) {
    $braise2_query->the_post();
?>

    <div class="modal fade tips-modal" tabindex="-1" role="dialog" id="braise-2">
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
                        <h2><?php the_title();?></h2>
                        <p class="timing-info"><?= the_field('number_of_ingredients');?> ingredients, <?= the_field('preparation_time');?>, Servings: <?= the_field('servings');?> </p>
                        <?php if(get_field('image')) { ?>
                            <img class="recipe-img" src="<?= the_field('image');?>" alt="<?php the_title();?>">
                        <?php } else { ?>
                            <img class="recipe-img" src="<?=get_template_directory_uri();?>/assets/img/recipe-img.jpg" alt="<?php the_title();?>">
                        <?php } ?>
                        <?php if(get_field('image_source')) { ?>
                            <div class="cite image-cite"><?php the_field('image_source');?></div>
                        <?php } ?>

                        <div class="recipe-content-wrap">
                            <?= the_field('content');?>
                        </div>
                        <!-- /.recipe-content-wrap -->
                        <?php if(get_field('recipe_source')) { ?>
                            <div class="cite">Source: <?= the_field('recipe_source');?></div>
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

<?php
}
// Restore original Post Data
wp_reset_postdata();
?>
<!-- ========== END BRAISE 2 ========== -->

<!-- ========== SOUS VIDE 1 ========== -->
<?php
    $sv1_post = get_field('sv_1', 5);

    // WP_Query arguments
    $args11 = array(
        'post_type' => 'tips',
        'p'                      => $sv1_post,
    );

    // The Query
    $sv1_query = new WP_Query( $args11 );
    // The Loop
    while ( $sv1_query->have_posts() ) {
    $sv1_query->the_post();
?>

    <div class="modal fade tips-modal" tabindex="-1" role="dialog" id="sv-1">
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
                        <h2><?php the_title();?></h2>
                        <p class="timing-info"><?= the_field('number_of_ingredients');?> ingredients, <?= the_field('preparation_time');?>, Servings: <?= the_field('servings');?> </p>
                        <?php if(get_field('image')) { ?>
                            <img class="recipe-img" src="<?= the_field('image');?>" alt="<?php the_title();?>">
                        <?php } else { ?>
                            <img class="recipe-img" src="<?=get_template_directory_uri();?>/assets/img/recipe-img.jpg" alt="<?php the_title();?>">
                        <?php } ?>
                        <?php if(get_field('image_source')) { ?>
                            <div class="cite image-cite"><?php the_field('image_source');?></div>
                        <?php } ?>

                        <div class="recipe-content-wrap">
                            <?= the_field('content');?>
                        </div>
                        <!-- /.recipe-content-wrap -->
                        <?php if(get_field('recipe_source')) { ?>
                            <div class="cite">Source: <?= the_field('recipe_source');?></div>
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

<?php
}
// Restore original Post Data
wp_reset_postdata();
?>
<!-- ========== END SOUS VIDE 1 ========== -->
<!-- ========== SOUS VIDE 2 ========== -->
<?php
    $sv2_post = get_field('sv_2', 5);

    // WP_Query arguments
    $args12 = array(
        'post_type' => 'tips',
        'p'                      => $sv2_post,
    );

    // The Query
    $sv2_query = new WP_Query( $args12 );
    // The Loop
    while ( $sv2_query->have_posts() ) {
    $sv2_query->the_post();
?>

    <div class="modal fade tips-modal" tabindex="-1" role="dialog" id="sv-2">
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
                        <h2><?php the_title();?></h2>
                        <p class="timing-info"><?= the_field('number_of_ingredients');?> ingredients, <?= the_field('preparation_time');?>, Servings: <?= the_field('servings');?> </p>
                        <?php if(get_field('image')) { ?>
                            <img class="recipe-img" src="<?= the_field('image');?>" alt="<?php the_title();?>">
                        <?php } else { ?>
                            <img class="recipe-img" src="<?=get_template_directory_uri();?>/assets/img/recipe-img.jpg" alt="<?php the_title();?>">
                        <?php } ?>
                        <?php if(get_field('image_source')) { ?>
                            <div class="cite image-cite"><?php the_field('image_source');?></div>
                        <?php } ?>

                        <div class="recipe-content-wrap">
                            <?= the_field('content');?>
                        </div>
                        <!-- /.recipe-content-wrap -->
                        <?php if(get_field('recipe_source')) { ?>
                            <div class="cite">Source: <?= the_field('recipe_source');?></div>
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

<?php
}
// Restore original Post Data
wp_reset_postdata();
?>
<!-- ========== END SOUS VIDE 2 ========== -->