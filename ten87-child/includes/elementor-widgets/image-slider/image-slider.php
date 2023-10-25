<?php
class Elementor_Image_Slider extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'widget_name';
    }

    public function get_title()
    {
        return esc_html__('Ten87 Image Slider ', 'textdomain');
    }

    public function get_icon()
    {
        return 'eicon-gallery-grid';
    }

    public function get_custom_help_url()
    {
        return 'https://go.elementor.com/widget-name';
    }

    public function get_categories()
    {
        return ['Ten87'];
    }

    public function get_keywords()
    {
        return ['image', 'slider'];
    }


    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Partners Slider', 'elementor-oembed-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'images',
            [
                'label' => esc_html__('Images', 'textdomain'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'default' => [],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        include(__DIR__ . '/render.php');
    }
    /*
    public function get_style_depends()
    {
        return ['elementor-swiper-css'];
    }*/
    public function get_script_depends()
    {
        return ['swiper', 'elementor-image-slider-js'];
    }
}
