<!doctype html>
<html <?php language_attributes(); ?>>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="x-ua-compatible" content="IE=edge" >
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>

<header>

  <h1><a href="<?php echo esc_url( pll_home_url() ); ?>"><img
    src="<?php echo esc_url(wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full' )[0]); ?>"
    alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a></h1>
  <?php wp_nav_menu(array('container' => 'nav')); ?>
  <aside>
    <!-- SVG Icons from https://github.com/FortAwesome/Font-Awesome -->
    <a href="https://www.facebook.com/BellevueFarmStockholm"><img
      class="svg svg875"
      alt="<?php echo esc_attr(pll__('facebook'))?>"
      title="<?php echo esc_attr(pll__('facebook'))?>"
      src="<?php echo get_template_directory_uri(); ?>/images/facebook.svg"/></a>
    <a href="https://www.instagram.com/bellevuefarm_sthlm/"><img
      class="svg svg875"
      alt="<?php echo esc_attr(pll__('instagram'))?>"
      title="<?php echo esc_attr(pll__('instagram'))?>"
      src="<?php echo get_template_directory_uri(); ?>/images/instagram.svg"/></a>
    <a href="mailto:info@bellevuefarm.se"><img
      class="svg svg1000"
      alt="<?php echo esc_attr(pll__('email'))?>"
      title="<?php echo esc_attr(pll__('email'))?>"
      src="<?php echo get_template_directory_uri(); ?>/images/envelope.svg"/></a>
    <?php
      $languages = pll_the_languages(array('hide_current' => 1, raw => 1));
      foreach($languages as $lang => $data) {
        printf('<a href="%1$s"><img class="flag" src="%2$s/images/%3$s.svg" alt="%4$s" title="%4$s"></a>',
          esc_url($data['url']), get_template_directory_uri(),
          $data['slug'], esc_attr($data['name']));
      }
    ?>
  </aside>

</header>
