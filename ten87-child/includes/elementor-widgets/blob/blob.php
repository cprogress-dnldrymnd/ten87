<?php
class Elementor_Blob extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'blob';
    }

    public function get_title()
    {
        return esc_html__('Ten87 Blob ', 'textdomain');
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
        return ['blob'];
    }


    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Blob Settings', 'elementor-oembed-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'blob_class',
            [
                'label' => esc_html__('Blob Class', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
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
}
