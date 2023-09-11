<?php
$additional_info_enabled  = obsius_get_post_value_through_levels( 'qodef_blog_list_enable_additional_info' ) !== 'no';
?>

<article <?php post_class( 'qodef-blog-item qodef-e' ); ?>>
	<div class="qodef-e-inner">
		<?php
		// Include post media
		obsius_template_part( 'blog', 'templates/parts/post-info/media' );
		?>
		<div class="qodef-e-content">
			<div class="qodef-e-top-holder">
				<div class="qodef-e-info">
					<?php
					// Include post date info
					obsius_template_part( 'blog', 'templates/parts/post-info/date' );

					// Include post category info
					obsius_template_part( 'blog', 'templates/parts/post-info/categories' );
					?>
				</div>
			</div>
			<div class="qodef-e-text">
				<?php
				// Include post title
				obsius_template_part( 'blog', 'templates/parts/post-info/title', '', array( 'title_tag' => 'h2' ) );

				// Include post excerpt
				obsius_template_part( 'blog', 'templates/parts/post-info/excerpt' );

				// Hook to include additional content after blog single content
				do_action( 'obsius_action_after_blog_single_content' );
				?>
			</div>
			<?php
			if ( $additional_info_enabled ) { ?>
				<div class="qodef-e-bottom-holder">
					<div class="qodef-e-left">
						<?php
						// Include post read more
						obsius_template_part( 'blog', 'templates/parts/post-info/read-more' );

						// Include post author info
						obsius_template_part( 'blog', 'templates/parts/post-info/author' );

						// Include post comments info
						obsius_template_part( 'blog', 'templates/parts/post-info/comments' );
						?>
					</div>
					<div class="qodef-e-right qodef-e-info">
						<?php
						// Include post category info
						obsius_template_part( 'blog', 'templates/parts/post-info/tags' );
						?>
					</div>
				</div>
			<?php }	?>
		</div>
	</div>
</article>
