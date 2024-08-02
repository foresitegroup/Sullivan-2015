<?php
// Don't send emails when Wordpress updates happen
add_filter('auto_core_update_send_email', 'stop_auto_update_emails', 10, 4);
function stop_update_emails($send, $type, $core_update, $result) {
  if (!empty($type) && $type == 'success') return false;
  return true;
}
add_filter('auto_plugin_update_send_email', '__return_false');
add_filter('auto_theme_update_send_email', '__return_false');

/* Disable WordPress Admin Bar for all users */
add_filter('show_admin_bar', '__return_false');

// Disable Gutenberg editor.
add_filter('use_block_editor_for_post_type', '__return_false', 10);

// Remove Gutenberg Block Library CSS
add_action('wp_enqueue_scripts', 'my_styles');
function my_styles() {
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('wp-block-library-theme');
  wp_dequeue_style('wc-blocks-style'); // Remove WooCommerce block CSS
  wp_dequeue_style('global-styles'); // Remove inline block CSS
  wp_dequeue_style('classic-theme-styles');
}

add_action('after_setup_theme', 'my_thumbnail_size', 11);
function my_thumbnail_size() {
  set_post_thumbnail_size();
}

// Don't wrap images in P tags
add_filter('the_content', 'filter_ptags_on_images');
function filter_ptags_on_images($content){
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// Wrap video embed code in DIV for responsive goodness
add_filter( 'embed_oembed_html', 'my_oembed_filter', 10, 4 ) ;
function my_oembed_filter($html, $url, $attr, $post_ID) {
  $return = '<div class="video">'.$html.'</div>';
  return $return;
}

/* Lowers the metabox priority to 'low' for Yoast SEO's metabox. */
add_filter('wpseo_metabox_prio', 'lower_yoast_metabox_priority');
function lower_yoast_metabox_priority($priority) {
  return 'low';
}

add_filter('excerpt_more', 'wpdocs_excerpt_more');
function wpdocs_excerpt_more($more) {
  return '';
}
?>