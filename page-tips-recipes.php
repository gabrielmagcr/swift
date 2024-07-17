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

    .pi-top-link {
        display: block;
        width: 100%;
        height: 100%;
        position: absolute;
    }
    .product-item-hidden {
                display: none;
            }
            .view-more-link{position: relative;
            z-index: 1000;}
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
                'post_type'      => 'tips',
                'posts_per_page' => -1,
                'orderby'        => 'date',
                'order'          => 'DESC',
                'meta_query'     => array(
                    array(
                        'key'     => 'hide_on_tips_page',
                        'compare' => '!=',
                        'value'   => 1
                    ),
                )
            );

            // The Query
            $query = new WP_Query($args);

            // The Loop
            if ($query->have_posts()) {
                $count = 0;
                while ($query->have_posts()) {
                    $query->the_post();
                    $id = get_the_ID();
                    $type = get_field('type');
                    $post_link = get_permalink($id);
                    $class = ($count >= 6) ? 'hidden' : '';

                    if ($type == 'recipe') {
            ?>
                        <a href="<?php the_permalink(); ?>" class="pi-top-link">
                            <div class="product-item all <?= the_field('type'); ?> <?= $methods; ?> <?= $hidden; ?> col-lg-4 col-sm-6 col-xs-12 col-md-4 <?= $class; ?>">
                                <div class="pi-top">
                                    <div class="pi-top--shim">
                                        <div class="pi-top--shim-bg pi-top--shim-bg-tips" style="background-image: url('<?= the_field("image"); ?>');"></div>
                                    </div>
                                    <div class="title-wrap">
                                        <div class="title">
                                            <?php the_title(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
            <?php
                        $count++;
                    } // End of the if
                } // End of the while
            } // End of the if
            wp_reset_postdata();
            ?>
        </div>
        <!-- /#products-wrap.row -->

        <div class="sm-products--view-more">
            <button id="sm-products-view-more">
                <span>View More Products</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16" viewBox="0 0 30 16" fill="none">
                <g clip-path="url(#clip0_350_1057)">
                    <path d="M27.4366 0L14.9936 12.443L2.55051 0L0.77832 1.77219L13.2214 14.2152L14.9936 16L29.2214 1.77219L27.4366 0Z" fill="#28334A"/>
                </g>
                <defs>
                    <clipPath id="clip0_350_1057">
                    <rect width="28.443" height="16" fill="white" transform="translate(0.77832)"/>
                    </clipPath>
                </defs>
                </svg>
            </button>
        </div>



        <!-- /.container -->
</section>

<!-- /#tips-recipes-wrap -->
<?php
get_template_part('parts/pre-footer-ctas');
get_footer(); ?>