<?php get_header(); $pid = get_option('page_for_posts'); $ll = (!is_paged() && !is_category()) ? acdd_llamamiento() : null;
acdd_band('Lo que hacemos y lo que decimos', $pid ? get_the_title($pid) : 'Actualidad', acdd_opt('act_sub')); ?>
<main id="main" class="sec"><div class="c">
  <nav class="fil" aria-label="Filtrar por tipo"><a href="<?php echo esc_url(home_url('/actualidad/')); ?>" class="<?php echo is_category() ? '' : 'on'; ?>">Todo</a>
  <?php foreach (get_categories(['hide_empty' => false]) as $c) echo '<a href="' . esc_url(get_category_link($c)) . '" class="' . (is_category($c->term_id) ? 'on' : '') . '">' . esc_html($c->name) . '</a>'; ?></nav>
  <?php if ($ll) : ?><div class="ok"><span class="tag">LLAMAMIENTO ABIERTO</span> <strong><?php echo esc_html($ll->post_title); ?></strong> <a class="lk" href="<?php echo esc_url(get_permalink($ll)); ?>">Ver y adherirse →</a></div><?php endif; ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); $cat = get_the_category(); $fe = get_post_meta(get_the_ID(), 'acdd_fecha_evento', true); ?>
    <article class="row"><span class="who"><?php echo esc_html($fe ? date_i18n('j \d\e F \d\e Y', strtotime($fe)) : get_the_date()); ?></span>
      <div><span class="eb"><?php echo esc_html($cat ? $cat[0]->name : ''); ?></span><h3><a href="<?php the_permalink(); ?>" style="text-decoration:none"><?php the_title(); ?></a></h3><p class="p" style="margin:0"><?php echo esc_html(get_the_excerpt()); ?></p></div>
      <a class="lk" href="<?php the_permalink(); ?>">Leer →</a></article>
  <?php endwhile; the_posts_pagination(); else : ?><p class="p">Estamos empezando a construir este archivo. Pronto vas a encontrar aquí nuestras próximas actividades y posicionamientos.</p><?php endif; ?>
</div></main>
<?php get_footer();
