<?php get_header(); ?>

<style>
    .tips-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
        justify-items: center;

    }

    .tips {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .tips-bg {
        height: 280px;
        max-height: 80%;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        border-radius: 4px 4px 0 0;
    }

    .tips-title-wrap {
        background: #28334A;
        padding: 10px;
        border-radius: 0 0 4px 4px;
        height: 20%;
        display: flex;
        align-items: center;
    }

    .tips-title-wrap span {
        color: #fff
    }
    .tips-link{
        width: 100%;
    }
    .tips-link:hover{
        text-decoration: none;
    }
    @media (min-width:1399px) {
        .tips-container {
            gap: 30px;
        }
        .tips-title-wrap{
            padding: 10px 10px 10px 15px;
        }
        .tips-title-wrap span {
            font-size: 1.1rem;
        }
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
        <div id="tips-content-wrap" class="tips-container">
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
                        <a href="<?php the_permalink(); ?>" class="tips-link all <?= the_field('ingredient_item'); ?> <?= the_field('cooking_style'); ?>">
                            <div class="tips all <?= the_field('ingredient_item'); ?> <?= the_field('cooking_style'); ?>">
                                <div class="tips-bg lazy" data-bg=<?= the_field("image"); ?>></div>
                                <div class="tips-title-wrap">
                                    <span><?php the_title(); ?></span>
                                </div>
                            </div>
                        </a>
            <?php

                    } // End of the if
                } // End of the while
            } // End of the if
            wp_reset_postdata();
            ?>
        </div>
        <!-- /#products-wrap.row -->

        <!-- /.container -->
</section>

<!-- /#tips-recipes-wrap -->
<?php
get_template_part('parts/pre-footer-ctas');
get_footer(); ?>