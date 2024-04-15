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

		if (is_post_type_archive('fundings')) {
			wp_enqueue_style('data-aos', 'https://unpkg.com/aos@2.3.4/dist/aos.js');
		}

		wp_enqueue_style('obsius-child-style', get_stylesheet_directory_uri() . '/style.css', array($main_style));
		wp_register_script('list-item-on-hover-js', get_stylesheet_directory_uri() . '/includes/elementor-widgets/list-item-on-hover/list-item-on-hover.js');
		wp_enqueue_script('obsius-swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js');
		wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js');

		if (is_post_type_archive('fundings')) {
			wp_enqueue_script('data-aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js');
		}

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
require_once('includes/hooks.php');


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
?>
	<div class="modal-form-backdrop modal-close"></div>
	<div class="modal-form" id="modal-form">
		<div class="modal-holder">
			<div class="inner">
				<div class="modal-content">
					<div class="row">
						<div class="content-holder">
							<div class="image-box">
								<img src="" alt="">
							</div>
							<div class="content-box">
								<div class="name-box">
									<h4></h4>
								</div>
								<div class="position-box">
									<span></span>
								</div>
								<div class="description-box">
									<p>

									</p>
								</div>
								<div class="social-box">

								</div>
							</div>
						</div>
						<div class="close-holder">
							<div class="modal-close">
								&#10006;
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		jQuery(document).ready(function() {
			console.log(jQuery('.post-6866 .qodef-e-title').html());
			jQuery(document).on("click", ".modal-trigger", function() {
				$post_id = jQuery(this).attr('post_id');

				$image = jQuery('.post-' + $post_id + ' .qodef-e-media-image img').attr('src');
				$name = jQuery('.post-' + $post_id + ' .qodef-e-title').html();
				$position = jQuery('.post-' + $post_id + ' .qodef-e-role').html();
				$description = jQuery('.post-' + $post_id + ' .qodef-e-excerpt').html();
				$socials = jQuery('.post-' + $post_id + ' .qodef-team-member-social-icons').html();


				jQuery('#modal-form .image-box img').attr('src', $image);
				jQuery('#modal-form .name-box h4').html($name);
				jQuery('#modal-form .position-box span').html($position);
				jQuery('#modal-form .description-box').html($description);
				jQuery('#modal-form .social-box').html($socials);

				jQuery('body').addClass('modal-active');

			});

			jQuery('.modal-close').click(function(e) {
				jQuery('body').removeClass('modal-active');

				e.preventDefault();
			});
		});
	</script>
<?php
}

add_action('obsius_action_before_body_tag_close', 'action_obsius_action_before_body_tag_close');
