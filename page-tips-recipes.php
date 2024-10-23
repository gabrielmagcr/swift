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

    .tips-link {
        width: 100%;
    }

    .tips-link:hover {
        text-decoration: none;
    }

    .tips-link {
        width: 100%;
        opacity: 1;
        transform: scale(1);
        transition: opacity 0.3s ease, transform 0.3s ease;
        display: block;
    }

    .tips-link.hidden {
        opacity: 0;
        transform: scale(0.9);
        pointer-events: none;
    }

    .tips-link.showing {
        opacity: 1;
        transform: scale(1);
    }


    @media (min-width: 1399px) {
        .tips-container {
            gap: 30px;
        }

        .tips-title-wrap {
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Filter logic
        const container = document.getElementById('tips-content-wrap');
        const filters = document.querySelectorAll('.r-filter-group li');

        const selectedFilters = {
            protein: '.all',
            method: '.all'
        };

        function applyFilters() {
            const items = container.querySelectorAll('.tips-link');
            items.forEach(function(item) {
                const matchesProtein = selectedFilters.protein === '.all' || item.classList.contains(selectedFilters.protein.slice(1));
                const matchesMethod = selectedFilters.method === '.all' || item.classList.contains(selectedFilters.method.slice(1));

                if (matchesProtein && matchesMethod) {
                    item.classList.remove('hidden');
                    item.classList.add('showing');
                    item.style.display = 'block';
                } else {
                    item.classList.remove('showing');
                    item.classList.add('hidden');
                    setTimeout(function() {
                        item.style.display = 'none';
                    }, 300); // Make sure this matches the CSS transition duration
                }
            });

            // Re-initialize lazy load after filtering
            $('.lazy').Lazy();
        }

        filters.forEach(function(filter) {
            filter.addEventListener('click', function() {
                const filterGroup = this.closest('.r-filter-group').dataset.filterGroup;
                const filterValue = this.dataset.filter;

                // Update the active class
                this.parentElement.querySelectorAll('li').forEach(function(li) {
                    li.classList.remove('active');
                });
                this.classList.add('active');

                // Update the selected filter for the group
                selectedFilters[filterGroup] = filterValue;

                // Apply filters
                applyFilters();
            });
        });

        // Search logic
        const searchInput = document.getElementById('tip-search');
        searchInput.addEventListener('keyup', function() {
            const searchText = this.value.toLowerCase();

            if (searchText === '') {
                // If search is cleared, reapply the filters
                applyFilters();
            } else {
                container.querySelectorAll('.tips-link').forEach(function(item) {
                    const title = item.querySelector('.tips-title-wrap span').textContent.toLowerCase();
                    const matchesProtein = selectedFilters.protein === '.all' || item.classList.contains(selectedFilters.protein.slice(1));
                    const matchesMethod = selectedFilters.method === '.all' || item.classList.contains(selectedFilters.method.slice(1));

                    // Display items that match the search text and currently selected filters
                    if (title.includes(searchText) && matchesProtein && matchesMethod) {
                        item.classList.remove('hidden');
                        item.classList.add('showing');
                        item.style.display = 'block';
                    } else {
                        item.classList.remove('showing');
                        item.classList.add('hidden');
                        setTimeout(function() {
                            item.style.display = 'none';
                        }, 300); // Make sure this matches the CSS transition duration
                    }
                });
            }

            // Re-initialize lazy load after search
            $('.lazy').Lazy();
        });
    });
</script>



<?php
get_template_part('parts/pre-footer-ctas');
get_footer(); ?>