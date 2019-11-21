<?php ob_start();
setlocale(LC_ALL, 'es'); ?>

<h3>
  Proceso de reserva del espectaculo del Artista/grupo <?= $act['Grupo'] ?>
</h3>
<h4>
  El <?= utf8_encode(strftime('%A, %d de %B', strtotime($act['Fecha']))) ?> a las
  <?= strftime('%H:%M', strtotime($act['Hora'])) ?>
</h4>
<?php if (isset($exito)) : ?>

  <form method="post">

    <dialog open>
      Su reserva se ha realizado con exito<br>
      <input type="submit" name="enterado" value="Gracias">
    </dialog>

  </form>
<?php endif; ?>

<form method="post">
  <label>D.N.I
    <input type="text" name="reser[dni]" value="<?= $reser['dni'] ?? '' ?>">

    <?php if (isset($errores['dni'])) : ?>
      <span class="err">* <?= $errores['dni'] ?></span>
    <?php endif; ?>
  </label>
  <br>

  <label>Número de entradas:
    <input type="text" name="reser[localidades]" value="<?= $reser['localidades'] ?? '' ?>">

    <?php if (isset($errores['localidades'])) : ?>
      <span class="err">*<?= $errores['localidades']; ?></span>
    <?php endif; ?>

  </label><br>
  <input type="submit" name="ok" value="Reservar">
</form>
<?php if (isset($errores['mens'])) : ?>
  <p class="err"><?= $errores['mens'] ?>. Hay errores en los datos introducidos</p>
<?php endif; ?>
<?php $contenido = ob_get_clean();
include 'base.php'; ?>
