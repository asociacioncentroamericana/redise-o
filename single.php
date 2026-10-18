<?php get_header(); while (have_posts()) : the_post(); $id = get_the_ID(); $cat = get_the_category(); $fe = get_post_meta($id, 'acdd_fecha_evento', true); $lu = get_post_meta($id, 'acdd_lugar', true);
$st = get_post_meta($id, 'acdd_llamamiento_estado', true); $lurl = get_post_meta($id, 'acdd_llamamiento_url', true); $cv = (int) get_post_meta($id, 'acdd_conversacion_id', true);
acdd_band($cat ? $cat[0]->name : 'Actualidad', get_the_title(), get_the_date()); ?>
<main id="main" class="sec"><div class="c entry">
  <?php if ($fe || $lu) echo '<p class="ok"><strong>' . ($fe ? esc_html(date_i18n('j \d\e F \d\e Y', strtotime($fe))) : '') . '</strong>' . ($lu ? ' · ' . esc_html($lu) : '') . '</p>'; ?>
  <?php if ($st) echo '<p><span class="tag">' . ($st == 'abierto' ? 'LLAMAMIENTO ABIERTO' : 'LLAMAMIENTO CERRADO') . '</span></p>'; ?>
  <?php the_content(); ?>
  <?php if ($st == 'abierto' && $lurl) echo '<p><a class="btn" href="' . esc_url($lurl) . '">Adherite</a></p>'; ?>
  <?php if ($cv && get_post_status($cv) == 'publish') echo '<h2 style="font-size:28px;margin-top:40px">Conversación relacionada</h2><div class="acddh">' . acddh_card($cv) . '</div>'; ?>
  <p style="margin-top:40px"><a class="lk" href="<?php echo esc_url(home_url('/actualidad/')); ?>">← Volver a Actualidad</a></p>
</div></main>
<?php endwhile; get_footer();
