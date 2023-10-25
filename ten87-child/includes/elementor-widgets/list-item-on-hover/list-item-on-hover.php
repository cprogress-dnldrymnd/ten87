<?php
class Elementor_List_Item_On_Hover extends \Elementor\Widget_Base
{

  public function get_name()
  {
    return 'list_item_on_hover';
  }

  public function get_title()
  {
    return esc_html__('Ten87 List Item on Hover ', 'textdomain');
  }

  public function get_icon()
  {
    return 'eicon-editor-list-ol';
  }

  public function get_categories()
  {
    return ['Ten87'];
  }

  public function get_keywords()
  {
    return ['list', 'item', 'hover'];
  }


  protected function register_controls()
  {

    $this->start_controls_section(
      'content_section',
      [
        'label' => esc_html__('Settings', 'elementor-oembed-widget'),
        'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
      'list',
      [
        'label'       => esc_html__('List Item', 'textdomain'),
        'type'        => \Elementor\Controls_Manager::REPEATER,
        'fields'      => [
          [
            'name'        => 'list_title',
            'label'       => esc_html__('Title', 'textdomain'),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'default'     => esc_html__('List Title', 'textdomain'),
            'label_block' => true,
          ],
          
          [
            'name'       => 'list_content',
            'label'      => esc_html__('Content', 'textdomain'),
            'type'       => \Elementor\Controls_Manager::WYSIWYG,
            'default'    => esc_html__('List Content', 'textdomain'),
            'show_label' => false,
          ],
        ],
        'default'     => [
          [
            'list_title'   => esc_html__('Title #1', 'textdomain'),
            'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
          ],
          [
            'list_title'   => esc_html__('Title #2', 'textdomain'),
            'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
          ],
        ],
        'title_field' => '{{{ list_title }}}',
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
