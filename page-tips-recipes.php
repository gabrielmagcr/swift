<?php get_header(); ?>
<style>
    .pi-top--shim-bg-tips {
        position: absolute;
        top: 0;
        bottom: 0rem;
        left: 0%;
        width: 100%;
        background-size: cover;
    }

    .tips-container {
        background: none;
    }
    .pi-top-link{
        display: block;
        width: 100%;
        height: 100%;
    }
</style>

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
        <div id="products-wrap" class="row iso tips-container">
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
            $query = new WP_Query($args);
            // $i = 0;

            // The Loop
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $id = get_the_ID();
                    $type = get_field('type');
                    $post_link = get_permalink($id);

                    if ($type == 'recipe') {

            ?>
                       
                            <div class="product-item all <?= the_field('type'); ?> <?= $methods; ?> <?= $hidden; ?> col-lg-4 col-sm-6 col-xs-12 col-md-4">
                            <a href="<?php the_permalink(); ?>" class=pi-top-link>
                                <div class="pi-top">
                                    <div class="pi-top--shim">
                                   

                                        <div class="pi-top--shim-bg pi-top--shim-bg-tips" style="background-image: url('<?= the_field("image"); ?>');"></div>
                                      
                                    </div>
                                    <div class="title-wrap">
                                        <div class="title">
                                            <?php the_title(); ?>
                                        </div>
                                        <!-- /.title -->
                                    </div>
                                    <!-- /.title-wrap -->
                                </div>
                                </a>
                                <!-- /.pi-top -->
                            
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
get_footer(); ?>