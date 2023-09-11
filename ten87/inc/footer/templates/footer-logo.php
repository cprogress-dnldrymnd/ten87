<?php if ( obsius_is_footer_logo_area_enabled() ) { ?>
    <div class="qodef-footer-logo-area">
	    <a itemprop="url" class="qodef-footer-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
	        <?php
	        $footer_logo_image_id = obsius_core_get_post_value_through_levels( 'qodef_footer_logo_area_image' );

	        if ( ! empty( $footer_logo_image_id ) ) {
	            echo wp_get_attachment_image( $footer_logo_image_id, 'full', false, array( 'class' => 'qodef-footer-logo' ) );
	        }
	        ?>
	    </a>
    </div>
<?php } ?>
