<?php

if ( ! function_exists( 'obsius_load_page_mobile_header' ) ) {
	/**
	 * Function which loads page template module
	 */
	function obsius_load_page_mobile_header() {
		// Include mobile header template
		echo apply_filters( 'obsius_filter_mobile_header_template', obsius_get_template_part( 'mobile-header', 'templates/mobile-header' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	add_action( 'obsius_action_page_header_template', 'obsius_load_page_mobile_header' );
}

if ( ! function_exists( 'obsius_register_mobile_navigation_menus' ) ) {
	/**
	 * Function which registers navigation menus
	 */
	function obsius_register_mobile_navigation_menus() {
		$navigation_menus = apply_filters( 'obsius_filter_register_mobile_navigation_menus', array( 'mobile-navigation' => esc_html__( 'Mobile Navigation', 'obsius' ) ) );

		if ( ! empty( $navigation_menus ) ) {
			register_nav_menus( $navigation_menus );
		}
	}

	add_action( 'obsius_action_after_include_modules', 'obsius_register_mobile_navigation_menus' );
}
