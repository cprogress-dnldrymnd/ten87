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
			<?php
			function update_existing_image_alts()
			{
				// Query all image attachments
				$query = new WP_Query(array(
					'post_type'      => 'attachment',
					'post_mime_type' => 'image',  // Only target images
					'post_status'    => 'inherit',
					'posts_per_page' => -1,        // Get all images
				));

				// Loop through each image attachment
				while ($query->have_posts()) {
					$query->the_post();
					$attachment_id = get_the_ID();

					// Get attachment metadata
					$attachment = get_post_meta($attachment_id, '_wp_attachment_metadata', true);
					if (empty($attachment['image_meta']['alt']) && !empty($attachment['file'])) {

						// Extract filename (without extension)
						$filename = pathinfo($attachment['file'], PATHINFO_FILENAME);

						// Update alt text in metadata
						$attachment['image_meta']['alt'] = $filename;
						wp_update_attachment_metadata($attachment_id, $attachment);
					}
				}

				wp_reset_postdata();
			}

			// Call the function to update alt text
			update_existing_image_alts();

			?>

			<?php wp_footer(); ?>
			</body>

			</html>