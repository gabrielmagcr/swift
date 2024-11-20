<?php
      /* 
 Template Name: page-tips-recipes
 */
get_header(); ?>


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
                            <li data-filter=".Beef">Beef</li>
                            <li data-filter=".Pork">Pork</li>
                            <li data-filter=".Bacon">Bacon</li>
                            <li data-filter=".Deli">Deli Meats</li>
                            <!-- <li data-filter=".Lamb">Lamb (coming soon)</li> -->
                        </ul>
                    </div>

                    <div class="wil-dropdown">
                        <div class="wil-select">
                            <span>Dish Type</span>
                            <i class="fa fa-chevron-down"></i>
                        </div>
                        <ul id="cooking-style-dd" class="wil-dropdown-menu r-filter-group" data-filter-group="method">
                            <li data-filter=".all">All</li>
                            <li data-filter=".main">Main Entrée</li>
                            <li data-filter=".side">Side Dish</li>
                            <li data-filter=".sandwiches">Sandwiches and Wraps</li>
                            <li data-filter=".appetizer">Appetizer</li>
                            <li data-filter=".salad">Salad</li>
                            <li data-filter=".breakfast">Breakfast</li>
                        </ul>
                    </div>

                    <div class="recipe-search-wrap">
                        <div class="main-search-form">
                            <label>
                                <input type="search" class="search-field quicksearch" id="tip-search" placeholder="Search">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="tips-content-wrap" class="tips-container">
            <?php
            // WP_Query arguments
            $args = array(
                'post_type' => 'tips',
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
            );

            // The Query
            $query = new WP_Query($args);

            // The Loop
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $id = get_the_ID();
                    $type = get_field('type');
                    $post_link = get_permalink($id);

                    if ($type == 'recipe') {
            ?>
                        <?php
                       $cooking_styles = get_field('cooking_style');

                       $cooking_styles_classes = '';                        
                       if ($cooking_styles && is_array($cooking_styles)) { 
                           $cooking_styles_classes = implode(' ', $cooking_styles); 
                       }
                       ?>
                       
                       <a href="<?php the_permalink(); ?>" class="tips-link all <?= esc_attr(the_field('ingredient_item')); ?> <?= esc_attr($cooking_styles_classes); ?>">
                           <div class="tips all <?= esc_attr(the_field('ingredient_item')); ?> <?= esc_attr($cooking_styles_classes); ?>">
                               <div class="tips-bg lazy" data-bg="<?= esc_attr(the_field('image')); ?>"></div>
                               <div class="tips-title-wrap">
                                   <span><?php the_title(); ?></span>
                               </div>
                           </div>
                       </a>
            <?php
                    }
                }
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>




<?php
get_template_part('parts/pre-footer-ctas');
get_footer(); ?>