			</div><!-- close #qodef-page-inner div from header.php -->
		</div><!-- close #qodef-page-outer div from header.php -->
		<?php
		<?= do_shortcode('[custom_template post_id="5252"]') ?>
		// Hook to include page footer template
		do_action( 'obsius_action_page_footer_template' );

		// Hook to include additional content before wrapper close tag
		do_action( 'obsius_action_before_wrapper_close_tag' );
		?>
	</div><!-- close #qodef-page-wrapper div from header.php -->
	<?php
	// Hook to include additional content before body tag closed
	do_action( 'obsius_action_before_body_tag_close' );
	?>
<?php wp_footer(); ?>
</body>
</html>
