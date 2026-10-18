<?php get_header(); $pr = acdd_programas(); acdd_band('Proyectos', 'Programas', acdd_opt('prog_sub')); ?>
<main id="main" class="sec"><div class="c">
  <?php if ($pr['camp']) echo acdd_camp_card($pr['camp']); ?>
  <div class="g2"><?php foreach ($pr['reg'] as $p) echo acdd_prog_card($p); ?></div>
  <?php if ($pr['pausa']) : ?><div style="margin-top:56px;border-top:1px solid var(--rule);padding-top:36px"><p class="eb" style="color:var(--grey)">Proyecto de futuro</p>
    <?php foreach ($pr['pausa'] as $p) echo '<h2 style="font-size:26px;color:#3B4A5F">' . esc_html($p->post_title) . ' <span class="est pa" style="vertical-align:middle">EN PAUSA</span></h2><p class="p" style="max-width:720px">' . esc_html(get_the_excerpt($p)) . '</p>'; ?></div><?php endif; ?>
</div></main>
<?php get_footer();
