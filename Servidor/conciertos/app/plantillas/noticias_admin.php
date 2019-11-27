<?php
ob_start();
$mode = isset($_GET['edit']) ? 'EDITAR' : !isset($_GET['delete']) ? 'CREAR' : 'BORRAR'
?>
<h2>NOTICIAS ADMIN - <?= $mode ?></h2>

<?php
if (isset($errors) && sizeof($errors) <= 0) {
    ?>
    <form method="POST">
        <input required name="titular" type="text" placeholder="titulo" value="<?= $noticia['titular'] ?>"><br>
        <textarea required name="desarrollo" id="" cols="30" rows="10"><?= $noticia['desarrollo'] ?></textarea>
        <br>
        <input type="submit" value="editar" name="edit">
    </form>
    <?php
}
?>

<div id="errors">
    <?php
    if (isset($errors)) {
        foreach ($errors as $error) {
            ?>
            <p><strong>Error: </strong> <?= $error ?></p>
            <?php
        }
    }
    ?>
</div>

<?php
$contenido = ob_get_clean();
include 'base.php'; ?>

