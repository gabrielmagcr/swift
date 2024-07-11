<style>
	.social-links {
		display: flex;
		justify-content: center;
		gap: 10px;
		margin-bottom: 15px;
	}

	.social-links img {
  transition: filter 0.3s ease;
}

.social-links img:hover {
  filter: brightness(1.2);
}
.flavor-train {

	height: 300px !important;
}
@media (min-width: 1201px) {
    #ft-nav ul {
        width: 65%;
		}
	}
</style>

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
<script>
	jQuery(document).ready(function() {
		jQuery('.flip-card-inner').flip({
			axis: 'x'
		});
	});
</script>
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