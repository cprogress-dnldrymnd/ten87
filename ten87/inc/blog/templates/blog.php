<div class="qodef-grid-item <?php echo esc_attr( obsius_get_page_content_sidebar_classes() ); ?>">
	<?php
	// Hook to include additional content before blog loop
	do_action( 'obsius_action_before_blog_loop' );
	?>
	<div class="qodef-blog qodef-m <?php echo esc_attr( obsius_get_blog_holder_classes() ); ?>">
		<?php
		// Include posts loop
		obsius_template_part( 'blog', 'templates/parts/loop' );

		if ( ! is_single() ) {
			// Include pagination
			obsius_template_part( 'pagination', 'templates/pagination-wp' );
		}
		?>
	</div>
</div>
