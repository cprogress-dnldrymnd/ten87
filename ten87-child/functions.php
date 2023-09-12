<?php

if ( ! function_exists( 'obsius_child_theme_enqueue_scripts' ) ) {
	/**
	 * Function that enqueue theme's child style
	 */
	function obsius_child_theme_enqueue_scripts() {
		$main_style = 'obsius-main';

		wp_enqueue_style( 'obsius-child-style', get_stylesheet_directory_uri() . '/style.css', array( $main_style ) );
	}

	add_action( 'wp_enqueue_scripts', 'obsius_child_theme_enqueue_scripts' );
}

require_once('includes/post-types.php');
