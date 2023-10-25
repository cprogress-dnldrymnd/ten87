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
		jQuery(document).ready(function () {
			jQuery('.qodef-mobile-header-opener').click(function (e) {
				jQuery('html').toggleClass('menu-open');
				e.preventDefault();
			});

			var swiper = new Swiper(".mySwiperPostSlider", {
				navigation: {
					nextEl: ".swiper-button-next",
					prevEl: ".swiper-button-prev",
				},
			});
			jQuery('.list-item-on-hover .list-item').hover(function () {
				var $this = jQuery(this);
				jQuery('.list-item-on-hover .list-item').removeClass('active');
				$this.addClass('active');
				setTimeout(function () {
					$this.addClass('activate-animation');
				}, 300);


			}, function () {
				var $this = jQuery(this);
				$this.removeClass('activate-animation');
				setTimeout(function () {
					$this.removeClass('active');
				}, 300);

			}
			);
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

function get__post_meta($value)
{
	if (function_exists('carbon_get_the_post_meta')) {
		return carbon_get_the_post_meta($value);
	}
	else {
		return 'Error: Carbonfield not activated';
	}
}

function get__term_meta($term_id, $value)
{
	if (function_exists('carbon_get_term_meta')) {
		return carbon_get_term_meta($term_id, $value);
	}
	else {
		return 'Error: Carbonfield not activated';
	}
}

function get__post_meta_by_id($id, $value)
{
	if (function_exists('carbon_get_post_meta')) {
		return carbon_get_post_meta($id, $value);
	}
	else {
		return 'Error: Carbonfield not activated';
	}
}
function get__theme_option($value)
{
	if (function_exists('carbon_get_theme_option')) {
		return carbon_get_theme_option($value);
	}
	else {
		return 'Error: Carbonfield not activated';
	}
}

function show_custom_banner()
{

	$show_custom_page_heading = get__post_meta('show_custom_page_heading');

	if (get_post_type() == 'studios' || is_tax('studio_category') || is_post_type_archive('studio') || $show_custom_page_heading) {
		$show_custom_banner = true;
	}
	else {
		$show_custom_banner = false;
	}

	return $show_custom_banner;
}
add_filter('body_class', 'custom_class');
function custom_class($classes)
{
	$show_custom_banner = show_custom_banner();
	if ($show_custom_banner) {
		$classes[] = 'has-custom-page-heading';
	}
	return $classes;
}
