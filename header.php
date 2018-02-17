<!doctype html>
<html <?php language_attributes(); ?>>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>

<header>

  <h1><a href='<?php echo esc_url( pll_home_url() ); ?>'><img
    src='<?php echo esc_url(wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full' )[0]); ?>'
    alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a></h1>
	<?php wp_nav_menu(array('container' => 'nav')); ?>
  <aside>
    <a href="https://www.facebook.com/BellevueFarmStockholm"><i class="fab fa-facebook"></i></a>
    <a href="https://www.instagram.com/bellevuefarm_sthlm/"><i class="fab fa-instagram"></i></a>
    <a href="mailto:info@bellevuefarm.se"><i class="far fa-envelope"></i></a>
    <?php
      $languages = pll_the_languages(array('hide_current' => 1, 'show_flags' => 1, raw => 1));
      foreach($languages as $lang => $data) {
        printf('<a href="%s">%s</a>', esc_url($data['url']), $data['flag']);
      }
    ?>
  </aside>

</header>
