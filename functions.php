<?php
if (is_admin()) {
  configure_admin_ui();
} else {
  add_filter('show_admin_bar', '__return_false');
  add_action('init', 'head_cleanup');
  // Enqueue scripts & styles
  // https://codex.wordpress.org/Plugin_API/Action_Reference/wp_enqueue_scripts
  // “Despite the name, it is used for enqueuing both scripts and styles.”
  add_action('wp_enqueue_scripts', 'scripts_and_styles');
  add_filter('script_loader_tag', 'add_asyncdefer_attribute', 10, 2);
}
add_action('after_setup_theme', 'configure_theme_features');

function configure_theme_features() {
  add_theme_support('menus');
  add_theme_support('html5', array('gallery'));
  add_theme_support('custom-logo');
  add_theme_support('title-tag');
  register_nav_menus( array(
    'primary' => esc_html__('Primary Menu', 'bellevue'),
  ));
}

function configure_admin_ui() {
  define('DISALLOW_FILE_EDIT', true);

  // Allow editors to edit menus
  if(current_user_can('editor')) {
    $editor_role = get_role('editor');
    if(!$editor_role->has_cap('edit_theme_options')) {
      $editor_role->add_cap('edit_theme_options');
    }
    function hide_theme_selection_menu() {
      remove_submenu_page( 'themes.php', 'themes.php' );
    }
    add_action('admin_head', 'hide_theme_selection_menu');
  }

  // Make strings available for translation
  // https://polylang.pro/doc/function-reference/#pll_register_string
  foreach(array('facebook', 'instagram', 'email') as $s) {
    pll_register_string('bellevue', $s);
  }
}

// Remove the stuff that's not needed.
function head_cleanup() {
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_head', 'wp_resource_hints', 2);
  remove_action('wp_head', 'rest_output_link_wp_head', 10, 0);
  remove_action('wp_head', 'rel_canonical');
  remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
  remove_action('wp_head', 'wp_oembed_add_discovery_links');
  remove_action('wp_head', 'wp_oembed_add_host_js');
}

function scripts_and_styles() {
  // Add stylesheets.
  wp_enqueue_style('normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css', array(), null);
  wp_enqueue_style('gfonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto+Slab:300,400', array(), null);
  wp_enqueue_style('style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
  wp_enqueue_style('lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css', array(), null);

  // Add scripts.
  wp_enqueue_script('lightbox-defer', 'https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js', array(), null);
  wp_enqueue_script('fontawesome-defer', 'https://use.fontawesome.com/releases/v5.0.6/js/all.js', array(), null);
}

function add_asyncdefer_attribute($tag, $handle) {
  if (strpos($handle, 'defer') !== false) {
    return str_replace( '<script ', '<script defer ', $tag );
  } else {
    return $tag;
  }
}

?>
