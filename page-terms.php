<?php
    /* 
 Template Name: page-term
 */
get_header();
the_post(); ?>
<section id="privacy-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php the_content();?>
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /#tips-recipes-wrap -->
<?php get_footer();?>