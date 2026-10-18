<?php get_header(); acdd_band('Contacto', 'Hablemos', acdd_opt('contacto_sub')); $env = isset($_GET['enviado']) ? $_GET['enviado'] : ''; ?>
<main id="main" class="sec"><div class="c split" style="align-items:start">
  <div><?php if ($env === '1') echo '<p class="ok" role="status">Gracias. Hemos recibido tu mensaje y te responderemos personalmente.</p>'; elseif ($env === '0') echo '<p class="ok" role="alert">Revisa nombre, correo y mensaje: son obligatorios.</p>'; ?>
    <p class="p" style="font-size:19px"><?php echo esc_html(acdd_opt('contacto_intro')); ?></p>
    <form class="form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
      <input type="hidden" name="action" value="acdd_contacto"><input type="hidden" name="n" value="<?php echo esc_attr(wp_create_nonce('acdd_c')); ?>">
      <input class="hp" type="text" name="web" tabindex="-1" autocomplete="off" aria-hidden="true">
      <label for="f1">Nombre</label><input id="f1" name="nombre" required>
      <label for="f2">País</label><input id="f2" name="pais">
      <label for="f3">Correo</label><input id="f3" type="email" name="correo" required>
      <label for="f4">Motivo</label><select id="f4" name="motivo"><option>Quiero participar</option><option>Proponer una actividad</option><option>Prensa</option><option>Adherirme a un llamamiento</option><option>Otro</option></select>
      <label for="f5">Mensaje</label><textarea id="f5" name="mensaje" rows="6" required></textarea>
      <button class="btn" type="submit" style="border:0;cursor:pointer;font:inherit;font-weight:700">Enviar mensaje</button></form></div>
  <aside style="display:grid;gap:32px">
    <div class="ln"><h3>Prensa</h3><p class="p"><?php echo acdd_opt('correo_prensa') ? 'Declaraciones, portavoces y material gráfico: <a href="mailto:' . esc_attr(acdd_opt('correo_prensa')) . '">' . esc_html(acdd_opt('correo_prensa')) . '</a>. ' : ''; ?>Los comunicados están en <a href="<?php echo esc_url(home_url('/actualidad/')); ?>">Actualidad</a>.</p></div>
    <div class="ln"><h3>ACDD</h3><p class="p">Madrid, España</p></div></aside>
</div></main>
<?php get_footer();
