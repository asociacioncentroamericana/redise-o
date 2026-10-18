<!doctype html>
<html <?php language_attributes(); ?>>
<head><meta charset="<?php bloginfo('charset'); ?>"><meta name="viewport" content="width=device-width,initial-scale=1"><?php wp_head(); ?></head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip" href="#main">Saltar al contenido</a>
<header class="hd"><div class="c hd-in">
  <?php if (has_custom_logo()) { the_custom_logo(); } else { echo '<a class="logo" href="' . esc_url(home_url('/')) . '">ACDD</a>'; } ?>
  <nav aria-label="Principal"><?php wp_nav_menu(['theme_location' => 'principal', 'container' => false, 'fallback_cb' => 'acdd_menu_fallback']); ?></nav>
</div></header>
