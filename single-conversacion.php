<?php get_header(); while (have_posts()) : the_post(); $id = get_the_ID(); $url = get_permalink(); $t = get_the_title();
$paises = get_the_term_list($id, 'pais', '', ', '); $pid = acddh_meta($id, 'programa_id'); $progs = $pid ? '<a href="' . esc_url(get_permalink($pid)) . '">' . esc_html(get_the_title($pid)) . '</a>' : ''; ?>
<main class="acddh acddh-wrap acddh-single">
  <p><a class="acddh-link" href="<?php echo esc_url(get_post_type_archive_link('conversacion')); ?>">← Volver a #HablemosDeCentroamérica</a></p>
  <header><p class="acddh-who"><?php echo esc_html(acddh_meta($id, 'participante')); ?><?php if ($c = acddh_meta($id, 'cargo')) echo ' · ' . esc_html($c); ?></p>
    <h1><?php echo esc_html($t); ?></h1></header>
  <div class="acddh-video"><?php echo acddh_player($id); ?></div>
  <p class="acddh-intro"><?php echo esc_html(get_the_excerpt()); ?></p>
  <div class="acddh-cols"><div class="acddh-text"><?php the_content(); ?>
    <?php if ($tr = acddh_meta($id, 'transcripcion')) : ?><details><summary>Transcripción</summary><?php echo wpautop(esc_html($tr)); ?></details><?php endif; ?>
    <?php if ($s = acddh_meta($id, 'subtitulos')) : ?><p><a href="<?php echo esc_url($s); ?>">Subtítulos</a></p><?php endif; ?></div>
  <aside class="acddh-meta"><dl>
    <dt>Publicado</dt><dd><?php echo esc_html(get_the_date()); ?></dd>
    <?php if ($x = acddh_meta($id, 'duracion')) echo '<dt>Duración</dt><dd>' . esc_html($x) . '</dd>'; ?>
    <?php if ($x = acddh_tags($id)) echo '<dt>Temas</dt><dd>' . $x . '</dd>'; ?>
    <?php if ($paises) echo '<dt>Países</dt><dd>' . $paises . '</dd>'; ?>
    <?php if ($progs) echo '<dt>Programa</dt><dd>' . $progs . '</dd>'; ?>
    <?php if ($x = acddh_meta($id, 'participantes_extra')) echo '<dt>También participan</dt><dd>' . esc_html($x) . '</dd>'; ?>
    <?php if ($x = acddh_meta($id, 'creditos')) echo '<dt>Créditos</dt><dd>' . nl2br(esc_html($x)) . '</dd>'; ?>
  </dl>
  <p class="acddh-share"><strong>Compartir</strong>
    <a href="https://wa.me/?text=<?php echo rawurlencode($t . ' ' . $url); ?>" rel="noopener">WhatsApp</a>
    <a href="https://twitter.com/intent/tweet?text=<?php echo rawurlencode($t); ?>&url=<?php echo rawurlencode($url); ?>" rel="noopener">X</a>
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode($url); ?>" rel="noopener">Facebook</a>
    <a href="mailto:?subject=<?php echo rawurlencode($t); ?>&body=<?php echo rawurlencode($url); ?>">Correo</a>
    <button type="button" class="acddh-copy" data-url="<?php echo esc_url($url); ?>">Copiar enlace</button></p></aside></div>
  <?php
  $rel = get_posts(['post_type' => 'conversacion', 'post_status' => 'publish', 'numberposts' => 3, 'post__not_in' => [$id], 'fields' => 'ids']);
  if ($rel) { echo '<section><h2>También te puede interesar</h2><div class="acddh-grid">'; foreach ($rel as $r) echo acddh_card($r); echo '</div></section>'; }
  ?>
</main>
<?php endwhile; get_footer();
