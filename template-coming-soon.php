<?php
/*
Template Name: Coming Soon
*/

get_header();
the_post();
$thumbnail = get_the_post_thumbnail_url();
if($thumbnail != "") {
    $bg = $thumbnail;
} else {
    $bg = "/wp-content/themes/swift/assets/img/coming-soon-hero.jpg";
}
?>
<section id="coming-soon-hero" class="main-hero" style="background-image: url(<?= $bg;?>);">
    <div class="container">
        <div class="row">
            <h1>Coming<br><span>Soon</span></h1>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /#products-hero -->
<section class="main-content">
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
<!-- /.main-content -->
<?php get_footer();?>