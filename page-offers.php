<?php
/* 
 Template Name: page-offers
 */
get_header();
the_post();
$thumbnail = get_the_post_thumbnail_url();
if($thumbnail != "") {
    $bg = $thumbnail;
} else {
    $bg = "/wp-content/themes/swift/assets/img/offers-hero.jpg";
}
?>
<section id="offers-hero" style="background-image: url(<?= $bg;?>);">
    <div class="container">
        <div class="row">
            <h1>Swift Savings for Your Next Meal</h1>
            <a href="/wp-content/uploads/2022/12/Swift_Online-Coupon-2023-2024.pdf" class="gold-btn" target="_blank">View Coupon</a> <!-- /.gold-btn -->
            <p class="coupon">Accepted by participating retailers.</p>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /#offers-hero -->
<?php get_footer();?>