<?php ob_start() ?>

<form method="POST">

<label>
    Cantidad
    <input required name="res[amount]" type="number" placeholder="cantidad">
</label>
<label>
    Teléfono
    <input required name="res[telf]" type="telf" placeholder="telefono">
</label>
<input type="submit">
</form>
<br>
<?= isset($success) ? 'Se ha reservado correctamente.' : '' ?>
<?= isset($error) ? $error : '' ?>

<?php $contenido = ob_get_clean() ?>
<?php include 'base.php' ?>