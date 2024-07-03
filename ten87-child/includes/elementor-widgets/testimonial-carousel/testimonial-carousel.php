<?php
class Elementor_Testimonial_Carousel extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'testimonial_carousel';
    }

    public function get_title()
    {
        return esc_html__('Ten87 Testimonial Carousel ', 'textdomain');
    }

    public function get_icon()
    {
        return 'eicon-editor-link';
    }

    public function get_categories()
    {
        return ['Ten87'];
    }

    public function get_keywords()
    {
        return ['testimonial', 'slider', 'carousel'];
    }


    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Testimonial Settings', 'elementor-oembed-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'number_of_slides_desktop',
            [
                'label' => esc_html__('Number of Slides Desktop', 'textdomain'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => '1',
            ]
        );


        $this->add_control(
            'number_of_slides_tablet',
            [
                'label' => esc_html__('Number of Slides Tablet', 'textdomain'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => '1',
            ]
        );
        $this->add_control(
            'number_of_slides_mobile',
            [
                'label' => esc_html__('Number of Slides Mobile', 'textdomain'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => '1',
            ]
        );

        $this->add_control(
            'slide_duration',
            [
                'label' => esc_html__('Slide Duration', 'textdomain'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => '15000',
            ]
        );

        $this->end_controls_section();
    }
    public function get_script_depends()
    {
        return ['swiper', 'testimonial-carousel-js'];
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
}
