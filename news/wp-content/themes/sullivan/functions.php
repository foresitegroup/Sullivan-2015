<?php
function my_thumbnail_size() {
  set_post_thumbnail_size();
}
add_action('after_setup_theme', 'my_thumbnail_size', 11);
?>