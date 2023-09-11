<?php
$additional_info_enabled  = obsius_get_post_value_through_levels( 'qodef_blog_list_enable_additional_info' ) !== 'no';
?>

<article <?php post_class( 'qodef-blog-item qodef-e' ); ?>>
	<div class="qodef-e-inner">
		<?php
		// Include post format part
		obsius_template_part( 'blog', 'templates/parts/post-format/link' );
		?>
	</div>
</article>
