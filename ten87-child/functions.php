<?php

if (!function_exists('obsius_child_theme_enqueue_scripts')) {
	/**
	 * Function that enqueue theme's child style
	 */
	function obsius_child_theme_enqueue_scripts()
	{
		$main_style = 'obsius-main';
		wp_register_script('elementor-image-slider-js', get_stylesheet_directory_uri() . '/includes/elementor-widgets/image-slider/elementor-image-slider-js.js');
		wp_register_script('elementor-swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js');
		wp_register_style('elementor-swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css');

		wp_enqueue_style('obsius-swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css');
		wp_enqueue_style('obsius-child-style', get_stylesheet_directory_uri() . '/style.css', array($main_style));
		wp_enqueue_script('obsius-swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js');
		wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js');

		wp_enqueue_script('module_handle', get_stylesheet_directory_uri() . '/assets/javascripts/main.js');
	}

	add_action('wp_enqueue_scripts', 'obsius_child_theme_enqueue_scripts');
}

function set_scripts_type_attribute($tag, $handle, $src)
{
	if ('module_handle' === $handle) {
		$tag = '<script type="module" src="' . $src . '"></script>';
	}
	return $tag;
}
add_filter('script_loader_tag', 'set_scripts_type_attribute', 10, 3);

/*-----------------------------------------------------------------------------------*/
/* Register Carbofields
/*-----------------------------------------------------------------------------------*/
add_action('carbon_fields_register_fields', 'tissue_paper_register_custom_fields');
function tissue_paper_register_custom_fields()
{
	require_once('includes/post-meta.php');
}

require_once('includes/post-types.php');
require_once('includes/shortcodes.php');
require_once('includes/elementor.php');


function action_wp_footer()
{
?>
	<script>
		jQuery(document).ready(function() {
			jQuery('.qodef-mobile-header-opener').click(function(e) {
				jQuery('html').toggleClass('menu-open');
				e.preventDefault();
			});

			var swiper = new Swiper(".mySwiperPostSlider", {
				navigation: {
					nextEl: ".swiper-button-next",
					prevEl: ".swiper-button-prev",
				},
			});
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


function swiper_navigation()
{
	ob_start();
?>
	<div class="swiper-navigation-holder">
		<div class="nav-inner">
			<div class="swiper-button-prev">
				<img src="<?= get_stylesheet_directory_uri() . '/assets/images/arrow.svg' ?>">
			</div>
			<div class="swiper-button-next">
				<img src="<?= get_stylesheet_directory_uri() . '/assets/images/arrow.svg' ?>">
			</div>
		</div>
	</div>
<?php
	return ob_get_clean();
}

function show_custom_banner() {

	$show_custom_page_heading = carbon_get_the_post_meta('show_custom_page_heading');

	if (get_post_type() == 'studios' || is_tax('studio_category') || is_post_type_archive('studio') || $show_custom_page_heading) {
		$show_custom_banner = true;
	}
	else {
		$show_custom_banner = false;
	}

	return $show_custom_banner;
}