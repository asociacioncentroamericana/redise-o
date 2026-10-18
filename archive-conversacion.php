<?php get_header(); $d = acddh_destacada_id(); ?>
<main class="acddh acddh-wrap">
  <header class="acddh-hero">
    <p class="acddh-eb">Una iniciativa editorial de ACDD</p>
    <h1>#HablemosDeCentroamérica</h1>
    <p class="acddh-intro"><?php echo esc_html(acddh_opt('intro', 'Una campaña audiovisual de ACDD para escuchar las voces de Centroamérica, conversar sobre sus desafíos y acercar la región a la conversación pública en España y Europa.')); ?></p>
    <?php if ($d) : ?><p><a class="acddh-btn" href="#conversaciones">Explorar las conversaciones</a></p><?php endif; ?>
  </header>
  <?php if ($d) : ?>
  <section class="acddh-feat"><div><?php echo acddh_player($d); ?></div><div>
    <p class="acddh-eb">Conversación destacada</p><p class="acddh-who"><?php echo esc_html(acddh_meta($d, 'participante')); ?></p>
    <h2><?php echo esc_html(get_the_title($d)); ?></h2><p><?php echo esc_html(get_the_excerpt($d)); ?></p>
    <p class="acddh-date"><?php echo esc_html(get_the_date('', $d)); ?></p><div><?php echo acddh_tags($d); ?></div>
    <p><a class="acddh-link" href="<?php echo esc_url(get_permalink($d)); ?>">Ver la ficha completa</a></p></div></section>
  <?php endif; ?>
  <section class="acddh-pres"><h2>Por qué esta campaña</h2><p><?php echo nl2br(esc_html(acddh_opt('presentacion', '[PENDIENTE: texto editorial de la campaña]'))); ?></p></section>
  <section id="conversaciones"><h2>Conversaciones</h2>
  <?php
  $total = (int) wp_count_posts('conversacion')->publish;
  $temas = $total > 6 ? get_terms(['taxonomy' => 'tema', 'hide_empty' => true]) : [];
  if ($temas && !is_wp_error($temas)) {
    echo '<nav class="acddh-filtros" aria-label="Filtrar por tema"><a href="' . esc_url(get_post_type_archive_link('conversacion')) . '">Todas</a>';
    foreach ($temas as $t) echo '<a href="' . esc_url(add_query_arg('acddh_tema', $t->slug, get_post_type_archive_link('conversacion'))) . '">' . esc_html($t->name) . '</a>';
    echo '</nav>';
  }
  if (have_posts()) { echo '<div class="acddh-grid">'; while (have_posts()) { the_post(); echo acddh_card(get_the_ID()); } echo '</div>'; the_posts_pagination(); }
  else echo '<p class="acddh-ph">Pronto publicaremos las primeras conversaciones.</p>';
  ?></section>
  <section class="acddh-cierre"><h2>Sigue la campaña</h2><p>Descubre las demás líneas de trabajo de ACDD.</p>
    <p><a class="acddh-btn" href="<?php echo esc_url(get_post_type_archive_link('programa')); ?>">Ver los programas de ACDD</a></p></section>
</main>
<?php get_footer();
