<footer class="ft"><div class="c">
  <span>ACDD · Asociación Centroamericana para la Democracia y el Desarrollo · Madrid, España</span>
  <span>
    <?php foreach (['rs_x' => 'X', 'rs_facebook' => 'Facebook', 'rs_instagram' => 'Instagram', 'rs_youtube' => 'YouTube', 'rs_linkedin' => 'LinkedIn'] as $k => $n) if ($u = acdd_opt($k)) echo '<a href="' . esc_url($u) . '" rel="noopener me">' . esc_html($n) . '</a>'; ?>
    <?php if ($m = acdd_opt('correo_prensa')) echo '<a href="mailto:' . esc_attr($m) . '">Prensa</a>'; ?>
    <?php if ($pp = get_privacy_policy_url()) echo '<a href="' . esc_url($pp) . '">Privacidad</a>'; ?>
  </span>
</div></footer>
<?php wp_footer(); ?>
</body></html>
