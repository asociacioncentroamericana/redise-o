<?php get_header(); while (have_posts()) : the_post(); $id = get_the_ID(); acdd_band('Programa', get_the_title(), get_the_excerpt()); ?>
<main id="main" class="sec"><div class="c entry"><?php the_content(); ?>
<?php $cv = get_posts(['post_type' => 'conversacion', 'numberposts' => 6, 'meta_key' => 'acddh_programa_id', 'meta_value' => (string) $id]);
if ($cv) { echo '<h2 style="font-size:28px;margin-top:40px">Conversaciones relacionadas</h2><div class="acddh">'; foreach ($cv as $c) echo acddh_card($c->ID); echo '</div>'; } ?>
<p style="margin-top:40px"><a class="lk" href="<?php echo esc_url(get_post_type_archive_link('programa')); ?>">← Todos los programas</a></p></div></main>
<?php endwhile; get_footer();
