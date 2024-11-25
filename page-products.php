<?php
/* 
 Template Name: page-products
 */
get_header(); ?>

<style>
    #products-wrap {
        overflow: hidden;
    }

    #products-wrap>.container {
        max-width: 1220px;
    }

    #filter-wrap {
        background-color: #FFAA2B;
    }
</style>

<section id="products-hero">
    <div class="container">
        <div class="row textcenter">
            <h1>Swift<br><span>Makes the Meal</span></h1>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /#products-hero -->
<section id="filter-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>All Products</h2>
                <p>Your next meal starts here. Choose from our cuts and cooking styles for a fresh take on dinner:</p>
                <!-- <div class="show-for-lg-only">
                    <ul class="product-filters products-cooking filter-group" data-filter-group="method">
                        <li data-filter=".all">All</li>
                        <li data-filter=".sear">Sear</li>
                        <li data-filter=".roast">Roast</li>
                        <li data-filter=".grill">Grill</li>
                        <li data-filter=".smoke">Smoke</li>
                        <li data-filter=".braise">Braise</li>
                        <li data-filter=".vide">Sous Vide</li>
                    </ul>
                  /.product-filters 
                </div>
                <div class="show-for-sm-only">
                   <div class="dropdown-label">Select Cut</div> -->
                <!-- /.dropdown-label -->
                <!-- <div class="wil-dropdown wd-mobile">
                        <div class="wil-select">
                            <span>Cooking Method</span>
                            <i class="fa fa-chevron-down"></i>
                        </div>
                        <ul class="wil-dropdown-menu products-cooking filter-group" data-filter-group="method">
                            <li data-filter=".all">All</li>
                            <li data-filter=".sear">Sear</li>
                            <li data-filter=".roast">Roast</li>
                            <li data-filter=".grill">Grill</li>
                            <li data-filter=".smoke">Smoke</li>
                            <li data-filter=".braise">Braise</li>
                            <li data-filter=".vide">Sous Vide</li>
                        </ul>
                    </div>
                </div>
               .show-for-sm-only -->
                <div class="filter-dropdown-wrap">
                    <div class="dropdown-label">Filter By:</div>
                    <!-- /.dropdown-label -->
                    <div class="wil-dropdown">
                        <div class="wil-select">
                            <span>All</span>
                            <i class="fa fa-chevron-down"></i>
                        </div>
                        <ul id="products-protein" class="wil-dropdown-menu filter-group" data-filter-group="protein">
                            <li id="pork" data-filter=".all">All</li>
                            <li id="pork" data-filter=".pork">Pork</li>
                            <li id="beef" data-filter=".beef">Beef</li>
                            <li id="bacon" data-filter=".bacon">Bacon</li>
                            <li id="deli" data-filter=".deli">Deli Meats</li>
                            <!-- 
                            <li id="lamb" data-filter=".lamb">Lamb</li>
                            <li id="veal" data-filter=".veal">Veal</li>
                            -->
                        </ul>
                    </div>
                </div>
                <!-- /.filter-dropdown-wrap -->
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /#filter-wrap -->
<section id="products-wrap">
    <div class="container">
        <div class="row iso">
            <?php
            // WP_Query arguments
            $args = array(
                'post_type'              => 'products',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'post_status' => 'publish'
            );

            // The Query
            $query = new WP_Query($args);
            // $i = 0;

            // The Loop
            $count = 0;
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $count++;
                    $query->the_post();
                    if (get_field('cooking_methods')) {
                        $cmethods = get_field('cooking_methods');
                        $methods = implode(' ', $cmethods);
                    }
                    $hidden = $count > 9 ? 'hidden' : '';

            ?>

                    <div class="product-item all <?= the_field('type'); ?> <?= $methods; ?> <?= $hidden; ?> col-lg-4 col-sm-6 col-xs-12 col-md-4">                        <div class="pi-top">
                            <a class="product-link" href="<?php the_permalink(); ?>">
                                <div class="pi-top--shim">
                                    <div class="pi-top--shim-bg" style="background-image: url('<?= the_field("product_image"); ?>');"></div>
                                </div>
                            </a>
                            <a class="product-link" href="<?php the_permalink(); ?>">
                                <div class="title-wrap">
                                    <div class="title">
                                        <?php the_title(); ?>
                                    </div>
                          
                            <!-- /.title -->
                        </div>
                        </a>
                        <!-- /.title-wrap -->
                    </div>

                    <!-- /.pi-top -->

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

    <div class="sm-products--view-more">
        <button id="sm-products-view-more">
            <span>View More Products</span>
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
    <!-- /.container -->
</section>
<!-- /#products-wrap -->

<?php
get_template_part('parts/pre-footer-ctas');

get_footer(); ?>