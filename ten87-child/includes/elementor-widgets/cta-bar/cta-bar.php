<?php
class Elementor_CTA_Bar extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'widget_name';
    }

    public function get_title()
    {
        return esc_html__('Ten87 CTA BAR ', 'textdomain');
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
        return ['cta', 'button'];
    }


    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('CTA Settings', 'elementor-oembed-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'cta_text',
            [
                'label' => esc_html__('CTA Heading', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Lorem ipsum dolor sit',
            ]
        );

        $this->add_control(
            'cta_url',
            [
                'label' => esc_html__('CTA URL', 'textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'label_block' => true,
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
