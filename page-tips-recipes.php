<?php get_header();?>
<section id="tips-recipes-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Great Meals To Gather Around</h1>
                <p>Pick your protein and your cooking style:</p>
                <div class="clearfix"></div>
                <div class="recipe-filter-wrap">
                    <div class="wil-dropdown">
                        <div class="wil-select">
                            <span>Protein</span>
                            <i class="fa fa-chevron-down"></i>
                        </div>
                        <ul id="protein-dd" class="wil-dropdown-menu r-filter-group" data-filter-group="protein">
                            <li data-filter=".all">All</li>
                            <li data-filter=".Pork">Pork</li>
                            <li data-filter=".Beef">Beef</li>
                            <!-- <li data-filter=".Lamb">Lamb (coming soon)</li> -->
                        </ul>
                    </div>

                    <div class="wil-dropdown">
                        <div class="wil-select">
                            <span>Cooking Style</span>
                            <i class="fa fa-chevron-down"></i>
                        </div>
                        <ul id="cooking-style-dd" class="wil-dropdown-menu r-filter-group" data-filter-group="method">
                            <li data-filter=".all">All</li>
                            <li data-filter=".skillet">Skillet</li>
                            <li data-filter=".oven">Oven</li>
                            <li data-filter=".grill">Grill</li>
                            <li data-filter=".smoker">Smoker</li>
                            <li data-filter=".multicooker">Multicooker</li>
                            <li data-filter=".sous">Sous Vide</li>
                            <li data-filter=".fryer">Fryer</li>
                        </ul>
                    </div>

                    <div class="recipe-search-wrap">
                        <div class="main-search-form">
                            <label>
                                <input type="search" class="search-field quicksearch" id="tip-search" placeholder="Search">
                            </label>
                        </div>
                    </div> 
                    <!-- /.recipe-search-wrap -->
                </div>
                <!-- /.recipe-filter-wrap -->
            </div>
        </div>
        <!-- /.row -->
        <div class="clearfix"></div>
        <div id="tips-content-wrap" class="row iso">
        <?php
    // WP_Query arguments
    $args = array(
        'post_type'              => 'tips',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
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
            $id = get_the_ID(); 
            $type = get_field('type');
            $post_link = get_permalink($id);  
            
            if ($type == 'recipe') {
           
                ?>
                 <div class="product-item all <?= the_field('type');?> <?= $methods; ?> <?= $hidden; ?> col-lg-4 col-sm-6 col-xs-12 col-md-4">
                <div class="pi-top">
                    
                    <div class="pi-top--shim">
                        <div class="pi-top--shim-bg" style="background-image: url('<?=the_field("image");?>');"></div>
                    </div>
                    
                    <div class="title-wrap">
                        <div class="title">
                            <?php the_title();?>
                        </div>
                        <!-- /.title -->
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
                    <?php if(get_field('highlights')) { ?>
                        <p class="ing-list">
                            <?=the_field("highlights");?>
                        </p>
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
                <?php
            } // End of the if
        } // End of the while
    } // End of the if
    ?>
    
        </div>
        <!-- /#tips-content-wrap.row -->
    </div>
    <!-- /.container -->
</section>

<!-- /#tips-recipes-wrap -->
<?php
get_template_part('parts/pre-footer-ctas');
get_footer();?>