<?php ob_start();
setlocale(LC_ALL, 'es'); ?>
    <h2>Espectáculos programados para esta temporada</h2>
<?php foreach ($actuaciones as $key => $value) : ?>
    <details>
        <summary>
            <strong>Grupo</strong>: <a href="index.php?ctl=reservar&act=<?= urlencode(serialize($value)); ?>"><?= $value['Grupo']; ?></a><br>
        </summary>
        <strong>Día</strong>: <?= $value['Fecha']; ?><br>
        <strong>Hora</strong>: <?= $value['Hora']; ?><br>
        <strong>Entradas disponibles</strong>: <?= $value['Disponibles']; ?><br>
        <strong>Precio</strong>: <?= $value['Precio']; ?>€<br>
    </details>
    <hr>
<?php endforeach; ?>
<?php $contenido = ob_get_clean();
include 'base.php'; ?>
