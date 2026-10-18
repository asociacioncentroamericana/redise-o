<?php get_header(); $ll = acdd_llamamiento(); $pr = acdd_programas(); ?>
<main id="main">
<section class="hero"><div class="c hero-in">
  <div><p class="eb">Asociación Centroamericana para la Democracia y el Desarrollo</p>
    <h1><?php echo esc_html(acdd_opt('hero_titulo')); ?></h1><p class="sub"><?php echo esc_html(acdd_opt('hero_sub')); ?></p>
    <div class="acts"><a class="btn" href="<?php echo esc_url(home_url('/que-hacemos/')); ?>"><?php echo esc_html(acdd_opt('hero_cta1')); ?></a>
    <a class="btn o" href="<?php echo esc_url(home_url('/actualidad/')); ?>"><?php echo esc_html(acdd_opt('hero_cta2')); ?></a></div></div>
  <div class="ph" style="min-height:420px"><?php if (has_post_thumbnail()) the_post_thumbnail('large'); ?></div>
</div></section>
<?php if ($ll) : $u = get_post_meta($ll->ID, 'acdd_llamamiento_url', true); ?>
<div class="strip"><div class="c"><span class="tag">LLAMAMIENTO ABIERTO</span><strong><?php echo esc_html($ll->post_title); ?></strong>
  <a class="lk" style="margin-left:auto" href="<?php echo esc_url($u ? $u : get_permalink($ll)); ?>">Adherite →</a></div></div>
<?php endif; ?>
<section class="sec"><div class="c"><h2>Qué hacemos</h2><p class="p" style="max-width:640px;font-size:19px;margin-bottom:44px"><?php echo esc_html(acdd_opt('qh_intro')); ?></p>
  <div class="g4"><?php for ($i = 1; $i <= 4; $i++) echo '<div class="ln"><h3>' . esc_html(acdd_opt("l{$i}_t")) . '</h3><p class="p">' . esc_html(wp_trim_words(acdd_opt("l{$i}_d"), 20)) . '</p></div>'; ?></div>
  <p style="margin-top:36px"><a class="lk" href="<?php echo esc_url(home_url('/que-hacemos/')); ?>">Conocer nuestras líneas de trabajo →</a></p></div></section>
<?php echo do_shortcode('[acdd_hablemos_inicio]'); ?>
<section class="sec cream"><div class="c"><h2>Proyectos</h2><div class="g3" style="margin-top:32px">
  <?php foreach (array_slice($pr['reg'], 0, 3) as $p) echo acdd_prog_card($p); ?></div>
  <p style="margin-top:28px"><a class="lk" href="<?php echo esc_url(get_post_type_archive_link('programa')); ?>">Ver todos los proyectos →</a></p></div></section>
<section class="sec"><div class="c split"><div class="ph" style="min-height:380px"></div><div><h2>Quiénes somos</h2>
  <p style="font-size:19px"><?php echo esc_html(acdd_opt('sobre_corto')); ?></p><p class="p"><?php echo esc_html(acdd_opt('sobre_corto2')); ?></p>
  <a class="btn" style="background:var(--ink)" href="<?php echo esc_url(home_url('/sobre-acdd/')); ?>">Conocer ACDD</a></div></div></section>
<section class="sec cream"><div class="c"><h2>Actualidad</h2><p class="p">Lo que hacemos y lo que decimos, a medida que pasa.</p><div class="g3" style="margin-top:28px">
  <?php foreach (get_posts(['numberposts' => 3]) as $p) { $cat = get_the_category($p->ID); echo '<article style="border-top:1px solid var(--ink);padding-top:16px"><p class="eb">' . esc_html($cat ? $cat[0]->name : '') . ' · ' . esc_html(get_the_date('', $p)) . '</p><h3>' . esc_html($p->post_title) . '</h3><a class="lk" href="' . esc_url(get_permalink($p)) . '">Leer →</a></article>'; } ?></div>
  <p style="margin-top:32px"><a class="lk" href="<?php echo esc_url(home_url('/actualidad/')); ?>">Ver toda la actualidad →</a></p></div></section>
<?php acdd_cierre(); ?>
</main>
<?php get_footer();
