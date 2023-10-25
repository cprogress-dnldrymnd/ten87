<?php

function register_new_widgets($widgets_manager)
{

    require_once(__DIR__  . '/elementor-widgets/image-slider/image-slider.php');

    $widgets_manager->register(new \Elementor_Image_Slider());
}
add_action('elementor/widgets/register', 'register_new_widgets');
