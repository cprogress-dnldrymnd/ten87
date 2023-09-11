<?php
$additional_info_enabled  = obsius_get_post_value_through_levels( 'qodef_blog_list_enable_additional_info' ) !== 'no';
?>

<article <?php post_class( 'qodef-blog-item qodef-e' ); ?>>
	<div class="qodef-e-inner">
		<?php
		// Include post format part
		obsius_template_part( 'blog', 'templates/parts/post-format/link' );
		?>
		<div class="qodef-e-content">
			<div class="qodef-e-info qodef-info--top">
				<?php
				// Include post date info
				obsius_template_part( 'blog', 'templates/parts/post-info/date' );
				?>
			</div>
			<div class="qodef-e-text">
				<?php
				// Include post content
				the_content();

				// Hook to include additional content after blog single content
				do_action( 'obsius_action_after_blog_single_content' );
				?>
			</div>
            <div class="qodef-e-bottom-holder">
                <div class="qodef-e-left qodef-e-info">
                    <div class="qodef-e-bottom-inner qodef-e-info">
                        <?php
                        // Include post comments info
                        obsius_template_part( 'blog', 'templates/parts/post-info/categories' );
                        ?>
                    </div>
                </div>
                <?php if ( $additional_info_enabled ) { ?>
                    <div class="qodef-e-right qodef-e-info">
                        <?php
                        // Include post tags info
                        obsius_template_part( 'blog', 'templates/parts/post-info/tags' );
                        ?>
                    </div>
                <?php } ?>
            </div>
		</div>
	</div>
</article>
