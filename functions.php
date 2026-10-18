<?php
if (!defined('ABSPATH')) exit;
define('ACDDH_DIR', get_template_directory() . '/');
define('ACDDH_URL', get_template_directory_uri() . '/');
add_action('after_setup_theme', function () {
  add_theme_support('title-tag'); add_theme_support('post-thumbnails'); add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);
  add_theme_support('custom-logo', ['height' => 80, 'width' => 240, 'flex-width' => true]);
  register_nav_menus(['principal' => 'Menú principal']);
});
add_action('wp_enqueue_scripts', function () { wp_enqueue_style('acdd', get_stylesheet_uri(), [], '1.0.0'); });
require_once ACDDH_DIR . 'inc/conversaciones.php';
require_once ACDDH_DIR . 'inc/contenido.php';

function acdd_band($eb, $t, $sub = '') {
  echo '<section class="band"><div class="c"><p class="eb">' . esc_html($eb) . '</p><h1>' . esc_html($t) . '</h1>' . ($sub ? '<p class="sub">' . esc_html($sub) . '</p>' : '') . '</div></section>';
}
function acdd_cierre() {
  echo '<section class="sec dark tc"><div class="nar"><h2>' . esc_html(acdd_opt('cierre_t')) . '</h2><p class="p" style="font-size:19px">' . esc_html(acdd_opt('cierre_d')) . '</p><a class="btn" href="' . esc_url(home_url('/contacto/')) . '">Escribinos</a></div></section>';
}
function acdd_menu_fallback() {
  echo '<ul><li><a href="' . esc_url(home_url('/que-hacemos/')) . '">Qué hacemos</a></li><li><a href="' . esc_url(get_post_type_archive_link('programa')) . '">Programas</a></li><li><a href="' . esc_url(home_url('/actualidad/')) . '">Actualidad</a></li><li><a href="' . esc_url(home_url('/sobre-acdd/')) . '">Sobre ACDD</a></li><li><a href="' . esc_url(home_url('/contacto/')) . '">Contacto</a></li></ul>';
}
function acdd_programas() {
  $r = ['camp' => null, 'reg' => [], 'pausa' => []];
  foreach (get_posts(['post_type' => 'programa', 'numberposts' => -1, 'orderby' => 'menu_order title', 'order' => 'ASC']) as $p) {
    $e = get_post_meta($p->ID, 'acdd_enlace', true);
    if ($e && strpos($e, 'hablemos') !== false) $r['camp'] = $p;
    elseif (get_post_meta($p->ID, 'acdd_estado', true) == 'pausa') $r['pausa'][] = $p;
    else $r['reg'][] = $p;
  }
  return $r;
}
function acdd_prog_link($p) { $e = get_post_meta($p->ID, 'acdd_enlace', true); return $e ? $e : get_permalink($p); }
function acdd_prog_card($p) {
  $est = get_post_meta($p->ID, 'acdd_estado', true); $lab = ['desarrollo' => 'EN DESARROLLO', 'pausa' => 'EN PAUSA'][$est] ?? 'ACTIVO';
  return '<article class="cd">' . (has_post_thumbnail($p) ? get_the_post_thumbnail($p, 'large', ['alt' => '']) : '<div class="ph"></div>') . '<div class="in"><span class="est' . ($est == 'pausa' ? ' pa' : '') . '">' . $lab . '</span><h3 style="margin-top:12px">' . esc_html($p->post_title) . '</h3><p class="p">' . esc_html(get_the_excerpt($p)) . '</p><a class="lk" href="' . esc_url(acdd_prog_link($p)) . '">Ver proyecto →</a></div></article>';
}
function acdd_camp_card($p) {
  return '<article class="camp">' . (has_post_thumbnail($p) ? get_the_post_thumbnail($p, 'large', ['alt' => '']) : '<div class="ph" style="background:#0E1B2E"></div>') . '<div class="in"><span class="tag">INICIATIVA EDITORIAL</span><h2 style="margin:14px 0 10px;font-size:30px">' . esc_html($p->post_title) . '</h2><p>' . esc_html(get_the_excerpt($p)) . '</p><a class="lk" href="' . esc_url(acdd_prog_link($p)) . '">Ver las conversaciones →</a></div></article>';
}
function acdd_llamamiento() {
  $q = get_posts(['numberposts' => 1, 'meta_key' => 'acdd_llamamiento_estado', 'meta_value' => 'abierto']);
  return $q ? $q[0] : null;
}
function acdd_conv_opts() {
  $o = ['' => '— Ninguna —'];
  foreach (get_posts(['post_type' => 'conversacion', 'numberposts' => -1, 'post_status' => ['publish', 'draft', 'future']]) as $c) $o[$c->ID] = $c->post_title;
  return $o;
}
