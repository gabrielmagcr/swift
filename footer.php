<style>

.flavor-train {
	background-image: url('<?php echo get_field('flavor_train_image'); ?>');
	height: <?php echo get_field('flavor_train_heigth'); ?>px !important;
	animation: flavorTrain2 35s linear infinite !important;
}

</style>
<!-- Osano Cookie Consent -->
	<script async src=https://cmp.osano.com/169m5QToXBlu63VAe/9c1544c8-47fb-4f1c-9688-c9f7d54a48cb/osano.js></script>
	<!-- Pixel code -->
	<script src="https://js.adsrvr.org/up_loader.1.1.0.js" type="text/javascript"></script>
        <script type="text/javascript">
            ttd_dom_ready( function() {
                if (typeof TTDUniversalPixelApi === 'function') {
                    var universalPixelApi = new TTDUniversalPixelApi();
                    universalPixelApi.init("9xyg7sk", ["c8wf0o2"], "https://insight.adsrvr.org/track/up");
                }
            });
        </script>

<section id="footer">
	<img class="ft-logo" src="<?= get_template_directory_uri(); ?>/assets/img/logo.svg" alt="Swift Meats">
	<div id="ft-nav">
		<div class="container">
			<div class="row">
				<div class="col-12">

					<ul>
						<li><a href="/privacy-policy">Privacy</a></li>
						<li><a href="/terms">Terms of Use</a></li>
						<!--<li class="middle"><a href="contact">Contact Us</a></li>-->
						<li><a href="/contact">Contact Us</a></li>
						<li><a href="/sitemap">Site Map</a></li>
						<li><a href="/sweepstakes-terms-conditions">Sweepstakes Terms & Conditions</a></li>
					</ul>
					<!-- <ul> </ul> -->
					<div class="social-links">
						<a href="https://www.youtube.com/channel/UCxUcwl7Iz4_EQwTrxmknCrQ" class="sticky-locations" title="Youtube" target="_blank"><img src="/wp-content/uploads/2024/05/youtube-.svg" alt="Youtube"></a>
						<a href="https://www.tiktok.com/@swiftmeats" target="_blank" title="TikTok" class="social-link"><img src="/wp-content/uploads/2024/05/tiktok-.svg" alt="TikTok"></a>
						<a href="https://www.facebook.com/SwiftMeats" target="_blank" title="Facebook" class="social-link"><img src="/wp-content/uploads/2024/05/facebook-.svg" alt="Facebook"></a>
						<a href="https://www.instagram.com/swift__meats/" target="_blank" title="Instagram" class="social-link"><img src="/wp-content/uploads/2024/05/instagram-.svg" alt="Instagram"></a>
						<a href="https://www.pinterest.com/swift__meats/" target="_blank" title="Pinterest" class="social-link"><img src="/wp-content/uploads/2024/05/pinterest.svg" alt="Pinterest"></a>
					</div>
					<!-- 
					<div class="swift--chopped-logo">
						<img src="/wp-content/themes/swift/assets/img/balancing-act-logo.png" style="height: 65px; width: auto;" alt="Chopped - Featured Product" />
					</div>
					<div class="swift--chopped-logo">
						<img src="/wp-content/themes/swift/assets/img/chopped-footer.png" style="height: 100px; width: auto;" alt="Chopped - Featured Product" />
					</div> -->

					<div class="clearfix"></div>
					<p>&copy;<?= date('Y'); ?> JBS All Rights Reserved.</p>
					</d>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container -->
		</div>
		<!-- /#ft-nav -->
</section>
<!-- /#footer -->
<?php wp_footer(); ?>

<?php if (is_page('tips-recipes')) { ?>
	<script>
		jQuery(window).load(function() {
			var urlparam = window.location.hash;
			if (urlparam != '') {
				jQuery(urlparam).modal('show');
			} else {
				// alert('empty')
			}

		})

		function getUrlVars() {
			var vars = {};
			var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
				vars[key] = value;
			});
			return vars;
		}
	</script>
<?php } ?>
<?php if (is_page('lamb')) { ?>
	<script>
		jQuery('.nextlevel-carousel').flickity({
			// options
			cellAlign: 'left',
			contain: true,
			wrapAround: true,
			groupCells: 3
		});
	</script>
<?php } ?>
</body>

</html>