<?php

if (!function_exists('obsius_child_theme_enqueue_scripts')) {
	/**
	 * Function that enqueue theme's child style
	 */
	function obsius_child_theme_enqueue_scripts()
	{
		$main_style = 'obsius-main';

		wp_enqueue_style('obsius-swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css');
		wp_enqueue_style('obsius-child-style', get_stylesheet_directory_uri() . '/style.css', array($main_style));
		wp_enqueue_script('obsius-swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js');
		wp_enqueue_script('ten87-main', get_stylesheet_directory_uri().'/assets/javascripts/main.js');
	}

	add_action('wp_enqueue_scripts', 'obsius_child_theme_enqueue_scripts');
}

require_once('includes/post-types.php');
require_once('includes/shortcodes.php');


function action_wp_footer()
{
?>
	<script>
		jQuery(document).ready(function () {
			jQuery('.qodef-mobile-header-opener').click(function (e) { 
				jQuery('html').toggleClass('menu-open');
				e.preventDefault();
			});
		});

		var swiper = new Swiper(".mySwiperPostSlider", {
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
		});
	</script>
<?php
}

add_action('wp_footer', 'action_wp_footer');

function custom_template($atts)
{
	extract(
		shortcode_atts(
			array(
				'post_id' => '',
			),
			$atts
		)
	);

	if (class_exists("\\Elementor\\Plugin")) {
		$pluginElementor = \Elementor\Plugin::instance();
		$contentElementor = $pluginElementor->frontend->get_builder_content($post_id);
	}

	return $contentElementor;
}


add_shortcode('custom_template', 'custom_template');