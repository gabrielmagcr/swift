<?php /* Template Name: Sitemap */ get_header(); ?>

<section id="sitemap-main">
    <div class="container">
        <div class="row">
        <div class="sitemap col-12">

<h1 class="title">Site Map</h1>  
<p>Welcome to the Swift Meats site map. Here, you’ll find an organized overview of our website to help you easily navigate through our offerings. Explore our range of premium meats, from succulent steaks to flavorful ribs, and discover our cooking tips and recipes. Whether you’re looking for product details, cooking suggestions, or company information, our site map is designed to guide you quickly to the content you need. Enjoy a seamless browsing experience as you explore the best in quality meat with Swift Meats.
</p>
<div class="sitemap-loop-pages">

        <h2 class="subtitle">Pages</h2>                 
        
        <?php $sitemaplooppages = new WP_Query( array( 
                'post_type' => 'page', 
                'posts_per_page' => -1, 
                'post__not_in' => array($pages, 269),
                'post_status' => 'publish',
                'orderby' => 'menu_order',
                'order' => 'asc'
        ));?>

        <ul>
        <?php while ( $sitemaplooppages->have_posts() ) : $sitemaplooppages->the_post(); ?>

            <li><a href="<?php echo get_permalink($post->ID); ?>" rel="dofollow" title="<?php the_title(); ?>">
                        <?php the_title(); ?>
                </a></li>
        
        <?php endwhile; ?>
        </ul>
        <?php wp_reset_query(); ?>

        </div><!-- sitemap-loop-pages -->
        <div class="sitemap-loop-posts">

        <?php $sitemaploopposts = new WP_Query( array( 
                'post_type' => 'post', 
                'posts_per_page' => -1, 
                'post_status' => 'publish' 
        ));?>
        <?php if($sitemaploopposts->have_posts()) { ?>
            <h2 class="subtitle">Posts</h2>
        <ul>
        <?php while ( $sitemaploopposts->have_posts() ) : $sitemaploopposts->the_post(); ?>

                <li><a href="<?php echo get_permalink($post->ID); ?>" rel="dofollow" title="<?php the_title(); ?>">
                        <?php the_title(); ?>
                </a></li>

        <?php endwhile; ?>
        </ul>
        <?php } ?>
        <?php wp_reset_query(); ?>

</div><!-- sitemap-loop-posts -->

</div><!-- .sitemap -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /#sitemap-main -->

<?php get_footer(); ?>