<?php ob_start() ; setlocale(LC_ALL, 'es');?>
    <h2>Noticias Actuales:<h2>
<?php    foreach($data as $notice): ?>
    <p>
        <strong>titulo: </strong> <?=$notice->getTitle()?> <br>
        <strong>descripcion: </strong> <?=$notice->getDescr()?>
        <a href="index.php?ctl=modify&act=<?= urlencode(serialize($notice)); ?>">Modificar</a>
    </p>
<?php endforeach; ?>

<?php $contenido=ob_get_clean() ; include 'base.php'; ?>