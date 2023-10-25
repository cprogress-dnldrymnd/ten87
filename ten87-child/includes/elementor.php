<?php

function register_new_widgets($widgets_manager)
{

    require_once(__DIR__  . '/elementor-widgets/image-slider/image-slider.php');
    require_once(__DIR__  . '/elementor-widgets/cta-bar/cta-bar.php');
	
    $widgets_manager->register(new \Elementor_CTA_Bar());
    $widgets_manager->register(new \Elementor_Image_Slider());
}
add_action('elementor/widgets/register', 'register_new_widgets');

function add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'Ten87',
		[
			'title' => esc_html__( 'Ten87', 'textdomain' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );