<?php ob_start() ?>

<?php if (isset($exito)): ?>
  <dialog>
    <form method="post">
      <p>Usuario Creado</p>
      <input type="submit" name="enteradoRegistrado" value="Gracias">
    </form>
  </dialog>
<?php endif; ?>


<form method="post">
<input type="text" name="usuario[usuario]" value="<?= isset($usuario['usuario']) ? $usuario['usuario'] : '' ?>">
  <?php if (isset($errores['usuario'])) {
    echo '<p class="error">Error usuario</p>';
  }?>

  <input type="text" name="usuario[pwd]" value="<?=  isset($usuario['pwd']) ? $usuario['pwd'] : '' ?>">
  <?php if (isset($errores['pwd'])) {
    echo '<p class="error">Error pwd</p>';
  }?>
  <input type="submit" name="registrar" value="registrar">
</form>
<?php if (isset($errores['mens'])) {
  echo $errores['mens'];
} ?>
 <?php $contenido = ob_get_clean() ?>

 <?php include 'base.php' ?>
