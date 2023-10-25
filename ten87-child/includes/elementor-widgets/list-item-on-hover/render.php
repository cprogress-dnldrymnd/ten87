<div class="list-item-on-hover">
  <?php
  if ($settings['list']) {
    echo '<div class="list-item-box" >';
    foreach ($settings['list'] as $item) {
      echo '<div class="elementor-repeater-item-' . esc_attr($item['_id']) . '">' . $item['list_title'] . '</div>';
      echo '<dd>' . $item['list_content'] . '</div>';
    }
    echo '</div>';
  }
  ?>
</div>