			<?php do_action('before_footer'); ?>

			</div><!-- close #qodef-page-inner div from header.php -->
			</div><!-- close #qodef-page-outer div from header.php -->
			<?php
			$hide_partners_logos = get__post_meta('hide_partners_logos');
			?>

			<?php if (!$hide_partners_logos) { ?>
				<div class="logo-slider">
					<?= do_shortcode('[custom_template post_id="5252"]'); ?>
				</div>
			<?php } ?>
			<?php
			// Hook to include page footer template
			do_action('obsius_action_page_footer_template');

			// Hook to include additional content before wrapper close tag
			do_action('obsius_action_before_wrapper_close_tag');
			?>
			</div><!-- close #qodef-page-wrapper div from header.php -->
			<div class="blob-footer-holder" id="blob-footer-holder">
				<div class="blob-box blob-footer">
					<svg viewBox="0 0 200 200">
						<defs>

							<radialGradient id="gradient" gradientTransform="translate(-0.5 -0.5) scale(2, 2)">
								<stop offset="0%" stop-color="#ff5932"></stop>
								<stop offset="10%" stop-color="rgba(255, 89, 50, 0.75)"></stop>
								<stop offset="20%" stop-color="rgba(255, 89, 50, 0.5)"></stop>
								<stop offset="40%" stop-color="rgba(255, 89, 50, 0)"></stop>
							</radialGradient>
						</defs>
						<path d="" fill="url('#gradient')"></path>
					</svg>

				</div>
			</div>

			<?php
			// Hook to include additional content before body tag closed
			do_action('obsius_action_before_body_tag_close');
			?>

			<?php wp_footer(); ?>
			</body>
			<script>
				// Create a new Swiper instance
				var newSwiper = new Swiper('.qodef-testimonials-list', {
					pauseOnMouseEnter: true,
				});
			</script>

			</html>