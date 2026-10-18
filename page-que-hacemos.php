<?php get_header(); acdd_band('Líneas de trabajo', get_the_title(), acdd_opt('qh_sub')); ?>
<main id="main" class="sec"><div class="c">
<?php for ($i = 1; $i <= 4; $i++) : ?>
  <div class="split" style="padding:36px 0;border-top:1px solid var(--rule)"><div style="<?php echo $i % 2 ? '' : 'order:2'; ?>"><div style="font:700 54px/1 var(--serif);color:var(--terra)"><?php echo '0' . $i; ?></div>
    <h2 style="font-size:32px;margin-top:10px"><?php echo esc_html(acdd_opt("l{$i}_t")); ?></h2><p class="p" style="font-size:18px"><?php echo esc_html(acdd_opt("l{$i}_d")); ?></p></div>
    <div class="ph"></div></div>
<?php endfor; ?></div></main>
<?php acdd_cierre(); get_footer();
