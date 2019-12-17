<?php

require_once __DIR__ . '/../Repositorio/TeatroRepositorio.php';
require_once __DIR__ . '/../Repositorio/EspectaculoRepositorio.php';
require_once __DIR__ . '/../Modelo/Teatro.php';
require_once __DIR__ . '/../Modelo/Espectaculo.php';


// Ejemplo de controlador para página home de la aplicación
class DefaultController
{
  public function inicio()
  {

    try {

      $teatroRepo = new TeatroRepositorio();
      $teatros = $teatroRepo->getAll();

      $data = [];

      foreach ($teatros as $teatro) {

        $expectaculoRepo = new EspectaculoRepositorio();
        $expectaculosdb = $expectaculoRepo->get($teatro['id']);

        $espectaculos = [];
        foreach ($expectaculosdb as $espectaculodb) {
          array_push(
            $espectaculos,
            new Espectaculo(
              $espectaculodb['id'],
              $espectaculodb['nombre'],
              $espectaculodb['fInicio'],
              $espectaculodb['fFin'],
              $espectaculodb['duracion'],
              $espectaculodb['idTeatro']
            )
          );
        }

        array_push($data, new Teatro($teatro['id'], $teatro['nombre'], $teatro['aforo'], $espectaculos));
      }
    } catch (PDOException $e) {
      $error = $e->getMessage();
    }


    require __DIR__ . '/../../app/plantillas/inicio.php';
  }
}
