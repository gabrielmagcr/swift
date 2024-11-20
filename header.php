<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section
 *
 */
?>

<!doctype html>
<html class="no-js"  <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	
	<!-- Force IE to use the latest rendering engine available -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Mobile Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0">
	<!-- If Site Icon isn't set in customizer -->
	<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
	<!-- Icons & Favicons -->
	<link rel="icon" href="/favicon.png">
	<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />	
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
	<?php } ?>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<script>
  function loadFlickityStyles() {
    if (!document.getElementById("flickity-stylesheet")) {
      var link = document.createElement("link");
      link.rel = "stylesheet";
      link.href = "https://unpkg.com/flickity@2/dist/flickity.min.css";
      link.id = "flickity-stylesheet";
      document.head.appendChild(link);
    }
  };
</script>
	<?php wp_head(); ?>
	<script async src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
	<!-- Google Tag Manager -->
	<script async>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-PWNBCJJ');</script>
	<!-- End Google Tag Manager -->
	<script async  type="text/javascript">new Image(1,1).src="//ad.ipredictive.com/d/track/cvt/pixel?acct_id=53617&cache_buster="+Math.floor(Date.now()/1000);</script>
	
	<noscript>
	<img src="//ad.ipredictive.com/d/track/cvt/pixel?acct_id=53617&cache_buster=[timestamp]" height="1" width="1" style="display:none"></img>
	</noscript>
</head>	
<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PWNBCJJ"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<style>
#gform_submit_button_2 {
    border: none;
    background-color: #dc1111;
    color: #fff;
    padding: 10px;
    border-radius: 4px;
}
</style>
	<?php //get_template_part('inc/top', 'sticky-links'); ?>
	<?php get_template_part('inc/top', 'navigation'); ?>