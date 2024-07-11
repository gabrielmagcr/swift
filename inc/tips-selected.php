<?php
    // WP_Query arguments
    $args = array(
        'post__in' => get_field('selected_tips_and_recipes'),
        'post_type'              => 'tips',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'hide_on_tips_page',
                'compare' => '!=',
                'value' => 1
            ),
        )
        // 'meta_key' => 'hide_on_tips_page',
        // 'meta_value' => 1
    );

    // The Query
    $query = new WP_Query( $args );
    // $i = 0;

    // The Loop
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $id = $post->ID;
            $type = get_field('type');
            if($type == 'recipe') {
    ?>
    <!-- ===== RECIPE TYPE ===== -->
    <div class="col-lg-4 tip-item ti-recipe col-sm-6 col-md-6 grid-item all <?= the_field('cooking_style');?> <?= the_field('ingredient_item');?>">
        <div class="inner">
            <div class="tip-overlay" data-toggle="modal" data-target="#tip-<?= $id;?>"></div><!-- /.tip-overlay -->
            <?php if(get_field('image')) { ?>
                <img src="<?= the_field('image');?>" alt="<?php the_title();?>">
            <?php } else { ?>
                <img src="<?= get_template_directory_uri();?>/assets/img/tips/recipe-ex.jpg" alt="The title">
            <?php } ?>

        </div>
        <!-- /.inner -->
        <div class="tip-headline">
            <?php if(get_field('headline')) { ?>
                <h3 data-toggle="modal" data-target="#tip-<?= $id;?>"><?= the_field('headline');?></h3>
            <?php } else { ?>
                <h3 data-toggle="modal" data-target="#tip-<?= $id;?>"><?php the_title();?></h3>
            <?php } ?>
        </div>
        <!-- /.tip-headline -->
    </div>
    <!-- /.col-lg-4 tip-item col-sm-6 col-md-6 -->

    <div class="modal fade tips-modal" tabindex="-1" role="dialog" id="tip-<?= $id;?>" data-title="<?= get_the_title(); ?>" data-id="<?= get_the_ID(); ?>" data-path="<?= $post->post_name; ?>">
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
                        <p class="timing-info"><?= the_field('number_of_ingredients');?> ingredients, <?= the_field('preparation_time');?><?php if(get_field('servings')) { ?>, Servings: <?= the_field('servings');?><?php } ?> </p>
                        <?php if(get_field('video')) { ?>
                            <video width="100%" height="auto" controls>
                                <source src="<?= the_field('video');?>" type="video/mp4">
                                <!-- <source src="movie.ogg" type="video/ogg">-->
                                Your browser does not support the video tag.
                            </video>
                        <?php } else { ?>
                            <?php if(get_field('image')) { ?>
                                <img class="recipe-img" src="<?= the_field('image');?>" alt="<?php the_title();?>">
                            <?php } else { ?>
                                <img class="recipe-img" src="<?=get_template_directory_uri();?>/assets/img/recipe-img.jpg" alt="<?php the_title();?>">
                            <?php } ?>
                        <?php } ?>
                        <?php if(get_field('image_source')) { ?>
                            <div class="cite image-cite"><?php the_field('image_source');?></div>
                        <?php } ?>

                        <div class="recipe-content-wrap">
                            <?= the_field('content');?>
                        </div>
                        <!-- /.recipe-content-wrap -->
                        <div class="cites">
                            <?php if(get_field('recipe_source')) { ?>
                                <div class="cite"><?= the_field('recipe_source');?></div>
                            <!-- /.cite -->
                            <?php } ?>
                            <div class="cite-left">
                                Share Recipe on Pinterest <a class="share-pin-link" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?=bloginfo('url');?>/tips-recipes/%23tip-<?=$id;?>&media=<?= the_field('image');?>&description=<?php the_title();?>"><img src="<?=get_template_directory_uri();?>/assets/img/share/pinterest.png"></a>
                            </div>
                            <!-- /.cite-left -->
                        </div>
                        <!-- /.cites -->
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

    <?php } elseif($type == 'graphic') { ?>
    <!-- ===== GRAPHIC TYPE ===== -->
    <div class="col-lg-4 tip-item ti-graphic col-sm-6 col-md-6 grid-item all skillet oven grill smoker multicooker sous vide fryer <?= the_field('ingredient_item');?>">
        <div class="inner">
            <div class="tip-overlay" data-toggle="modal" data-target="#tip-<?= $id;?>""></div>
            <img src="<?= the_field('image');?>" alt="<?php the_title();?>">
            <!-- /.tip-overlay -->
           <!-- <div class="tip-social">
                <ul>
                    <li>
                        <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div> -->
            <!-- /.tip-social -->
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.col-lg-4 tip-item col-sm-6 col-md-6 -->

    <div class="modal fade tips-modal" tabindex="-1" role="dialog" id="tip-<?= $id;?>" data-title="<?= get_the_title(); ?>" data-id="<?= get_the_ID(); ?>" data-path="<?= $post->post_name; ?>">
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
                                    <img src="<?= the_field('image');?>" alt="<?php the_title();?>">
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
    <?php } elseif($type == 'image') { ?>
    <!-- ===== IMAGE TYPE ===== -->
    <div class="col-lg-4 tip-item ti-image col-sm-6 col-md-6 grid-item all <?= the_field('cooking_style');?> <?= the_field('ingredient_item');?>">
        <div class="inner">
            <div class="tip-overlay" data-toggle="modal" data-target="#tip-<?= $id; ?>"></div>
            <img src="<?= the_field('image');?>" alt="<?php the_title();?>">
            <!-- /.tip-overlay -->
            <!-- <div class="tip-social">
                <ul>
                    <li>
                        <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div> -->
            <!-- /.tip-social -->
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.col-lg-4 tip-item col-sm-6 col-md-6 -->

    <div class="modal fade tips-modal" tabindex="-1" role="dialog" id="tip-<?= $id;?>" data-title="<?= get_the_title(); ?>" data-id="<?= get_the_ID(); ?>" data-path="<?= $post->post_name; ?>">
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
                        <img src="<?= the_field('image');?>" alt="<?php the_title();?>">
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
    <?php } elseif($type == 'video') { ?>
    <!-- ===== IMAGE TYPE ===== -->
    <div class="col-lg-4 tip-item ti-image col-sm-6 col-md-6 grid-item all <?= the_field('cooking_style');?> <?= the_field('ingredient_item');?>">
        <div class="inner">
            <div class="vid-btn" data-toggle="modal" data-target="#tip-<?= $id; ?>"></div>
            <div class="tip-overlay"></div>
            <img src="<?= the_field('image');?>" alt="<?php the_title();?>">
            <!-- /.tip-overlay -->
            <div class="tip-headline">
                <h3 data-toggle="modal" data-target="#tip-<?= $id;?>"><?php the_title();?></h3>

                <!-- /.share-trigger -->
            </div>
            <!-- /.tip-headline -->
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.col-lg-4 tip-item col-sm-6 col-md-6 -->

    <div class="modal fade tips-modal" tabindex="-1" role="dialog" id="tip-<?= $id;?>" data-title="<?= get_the_title(); ?>" data-id="<?= get_the_ID(); ?>" data-path="<?= $post->post_name; ?>">
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
                    <video width="100%" height="auto" controls>
                        <source src="<?= the_field('video');?>" type="video/mp4">
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
    <?php }
?>

<?php
    }
        } else {
            echo "No products";
        }

    // Restore original Post Data
    wp_reset_postdata();
?>
