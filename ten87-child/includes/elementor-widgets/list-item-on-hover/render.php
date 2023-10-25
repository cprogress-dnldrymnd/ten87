<div class="list-item-on-hover">
  <?php
  if ($settings['list']) {
    echo '<div class="list-item-box" >';
    foreach ($settings['list'] as $item) {
      echo '<div class="list-item-inner" >';
      echo '<div class="list-item" >';
      echo '<div class="list-item-title elementor-repeater-item-' . esc_attr($item['_id']) . '"><h2>' . $item['list_title'] . '</h2></div>';
      echo '<div class="list-item-content" >' . $item['list_content'] . '</div>';
      echo '</div>';
      echo '</div>';

    }
    echo '</div>';
  }
  ?>
</div>