<?php get_header(); acdd_band('Quiénes somos', get_the_title(), acdd_opt('sobre_sub')); ?>
<main id="main">
<section class="sec"><div class="c entry" style="font-size:18px"><?php while (have_posts()) { the_post(); the_content(); } ?></div></section>
<section class="sec cream"><div class="c"><p class="eb">Misión</p><p style="font:700 clamp(24px,3.4vw,34px)/1.25 var(--serif);max-width:900px;margin:0"><?php echo esc_html(acdd_opt('mision')); ?></p></div></section>
<section class="sec"><div class="c"><h2>Principios</h2><div class="g4" style="margin-top:28px"><?php for ($i = 1; $i <= 4; $i++) echo '<div class="ln"><h3>' . esc_html(acdd_opt("p{$i}_t")) . '</h3><p class="p">' . esc_html(acdd_opt("p{$i}_d")) . '</p></div>'; ?></div></div></section>
<section class="sec dark"><div class="c g2" style="gap:64px"><div><h2>Dónde trabajamos</h2><p class="p"><?php echo esc_html(acdd_opt('donde')); ?></p></div><div><h2>Por qué desde España</h2><p class="p"><?php echo esc_html(acdd_opt('porque')); ?></p></div></div></section>
<?php $eq = get_posts(['post_type' => 'persona', 'numberposts' => -1, 'orderby' => 'menu_order title', 'order' => 'ASC']);
if ($eq) : ?><section class="sec"><div class="c"><h2>Quiénes somos</h2><div class="g4" style="margin-top:28px">
<?php foreach ($eq as $p) { $c = get_post_meta($p->ID, 'acdd_cargo', true); $pa = get_post_meta($p->ID, 'acdd_pais', true);
  echo '<div>' . (has_post_thumbnail($p) ? get_the_post_thumbnail($p, 'medium_large', ['alt' => $p->post_title]) : '<div class="ph" style="min-height:220px"></div>') . '<h3 style="margin-top:12px;font-size:19px">' . esc_html($p->post_title) . '</h3><p class="who" style="margin:0">' . esc_html(trim($pa . ' · ' . $c, ' ·')) . '</p></div>'; } ?>
</div></div></section><?php endif; ?>
</main>
<?php get_footer();
