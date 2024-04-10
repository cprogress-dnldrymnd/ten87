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
		wp_register_script('list-item-on-hover-js', get_stylesheet_directory_uri() . '/includes/elementor-widgets/list-item-on-hover/list-item-on-hover.js');

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

function get__post_meta($value)
{
	if (function_exists('carbon_get_the_post_meta')) {
		return carbon_get_the_post_meta($value);
	} else {
		return 'Error: Carbonfield not activated';
	}
}

function get__term_meta($term_id, $value)
{
	if (function_exists('carbon_get_term_meta')) {
		return carbon_get_term_meta($term_id, $value);
	} else {
		return 'Error: Carbonfield not activated';
	}
}

function get__post_meta_by_id($id, $value)
{
	if (function_exists('carbon_get_post_meta')) {
		return carbon_get_post_meta($id, $value);
	} else {
		return 'Error: Carbonfield not activated';
	}
}
function get__theme_option($value)
{
	if (function_exists('carbon_get_theme_option')) {
		return carbon_get_theme_option($value);
	} else {
		return 'Error: Carbonfield not activated';
	}
}

function show_custom_banner()
{

	$show_custom_page_heading = get__post_meta('show_custom_page_heading');

	if (get_post_type() == 'studios' || is_tax('studio_category') || is_post_type_archive('studio') || $show_custom_page_heading) {
		$show_custom_banner = true;
	} else {
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


function action_obsius_action_before_body_tag_close()
{
	if (is_post_type_archive('team')) {
	?>
		<div class="modal-form" id="modal-form">
			<div class="modal-form-backdrop modal-close"></div>
			<div class="modal-content">
				<div class="image-box">
					<img src="https://ten87.theprogressteam.co.uk/wp-content/uploads/2024/02/screenshot-2024-01-23-at-11-43-50.png" alt="">
				</div>
				<div class="content-box">
					<div class="name-box">
						<h4>DJ BORING</h4>
					</div>
					<div class="position-box">
						<span>DJ / Producer</span>
					</div>
					<div class="description-box">
						<p>
							Watching DJ BORING in action is the antithesis of his mundane pseudonym; vibrant, energising, fun and full of passion, Tristan Hallis puts his all into every set. Over the last few years he has ascended rapidly thanks to his dazzling displays, impeccable selection and high quality productions. The Australian selector takes great pride in his digging capabilities, constantly searching for lesser-known gems from years gone by, and pairing them up with more recent cuts that are equally exceptional.
						</p>
					</div>
					<div class="social-box">

					</div>
				</div>
			</div>
		</div>
<?php
	}
}

add_action('obsius_action_before_body_tag_close', 'action_obsius_action_before_body_tag_close');
