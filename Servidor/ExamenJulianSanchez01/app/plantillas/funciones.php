<?php ob_start() ?>


<?php foreach ($data as $espectaculo) : ?>

  <h2><?= $espectaculo->getName() ?></h2>
  <h3>Funciones</h3>

  <?php foreach ($espectaculo->getFunciones() as $funcion) : ?> <br>
    <strong>Funcion:</strong> <a href="?ctl=reservar&id=<?= $funcion->getId() ?>"><?= $funcion->getFFuncion() ?></a> | <?= $funcion->getQuedan() === 0 ? 'No quedan butacas' : $funcion->getQuedan() . ' butacas' ?>
  <?php endforeach ?>

<?php endforeach ?>


<?= isset($error) ? $error : '' ?>


<?php $contenido = ob_get_clean() ?>
<?php include 'base.php' ?>