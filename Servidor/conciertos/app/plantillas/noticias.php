<?php ob_start(); ?>
<h2>NOTICIAS</h2>
<?=
(isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') ?
    '<a href="/?ctl=noticias_admin">Crear una noticia</a>' : ''
?>

<?php foreach ($noticias as $key => $value) : ?>
    <p>
    <h3><?= $value['titular']; ?> </h3>
    <h4>
        <?=
        (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') ?
            '<a href="/?ctl=noticias_admin&edit=' . $value['idNot'] . '">editar</a> | <a href="/?ctl=noticias_admin&delete=' . $value['idNot'] . '">borrar</a>' : ''
        ?>
    </h4>
    <?= $value['desarrollo']; ?><br>
    </p>
<?php endforeach; ?>
<?php $contenido = ob_get_clean();
include 'base.php'; ?>
