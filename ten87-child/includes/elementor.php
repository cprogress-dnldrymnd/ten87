<?php

function register_new_widgets($widgets_manager)
{

	require_once(__DIR__ . '/elementor-widgets/image-slider/image-slider.php');
	require_once(__DIR__ . '/elementor-widgets/cta-bar/cta-bar.php');
	require_once(__DIR__ . '/elementor-widgets/list-item-on-hover/list-item-on-hover.php');
	require_once(__DIR__ . '/elementor-widgets/blob/blob.php');
	require_once(__DIR__ . '/elementor-widgets/testimonial-carousel/testimonial-carousel.php');

	$widgets_manager->register(new \Elementor_CTA_Bar());
	$widgets_manager->register(new \Elementor_Image_Slider());
	$widgets_manager->register(new \Elementor_List_Item_On_Hover());
	$widgets_manager->register(new \Elementor_Blob());
	$widgets_manager->register(new \Elementor_Testimonial_Carousel());
}
add_action('elementor/widgets/register', 'register_new_widgets');

function add_elementor_widget_categories($elements_manager)
{

	$elements_manager->add_category(
		'Ten87',
		[
			'title' => esc_html__('Ten87', 'textdomain'),
			'icon'  => 'fa fa-plug',
		]
	);

}
add_action('elementor/elements/categories_registered', 'add_elementor_widget_categories');