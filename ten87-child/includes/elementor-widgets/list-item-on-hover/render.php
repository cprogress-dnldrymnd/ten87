<div class="list-item-on-hover">
  <?php
  if ($settings['list']) {
    echo '<dl>';
    foreach ($settings['list'] as $item) {
      echo '<dt class="elementor-repeater-item-' . esc_attr($item['_id']) . '">' . $item['list_title'] . '</dt>';
      echo '<dd>' . $item['list_content'] . '</dd>';
    }
    echo '</dl>';
  }
  ?>
</div>