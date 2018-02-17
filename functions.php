<?php
if (is_admin()) {
  add_theme_support('menus');
  define('DISALLOW_FILE_EDIT', true);
} else {
  // Cleanup the stuff that's not needed.
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_head', 'wp_resource_hints', 2);
  remove_action('wp_head', 'rest_output_link_wp_head', 10, 0);

  // Add stylesheets.
  wp_enqueue_style('normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css', array(), null);
  wp_enqueue_style('gfonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto+Slab:300,400|Roboto:400,700', array(), null);
  wp_enqueue_style('style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
  wp_enqueue_style('lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css', array(), null);

  wp_enqueue_script('lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js', array(), null);
  wp_enqueue_script('fontawesome', 'https://use.fontawesome.com/releases/v5.0.6/js/all.js', array(), null);
  //wp_enqueue_script('lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/luminous-lightbox/1.0.1/Luminous.min.js', array(), null);
}

add_theme_support('html5', array('gallery'));
add_theme_support('custom-logo');

?>
