<?php

require_once __DIR__ . '/../Repositorio/EspectaculoRepositorio.php';
require_once __DIR__ . '/../Repositorio/FuncionesRepositorio.php';
require_once __DIR__ . '/../Modelo/Funcion.php';
require_once __DIR__ . '/../Modelo/Espectaculo.php';

class FuncionesController
{

    public function show()
    {

        /*
            Comprobación del GET
        */
        if (!isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])) {
            header('Location: index.php?ctl=inicio');
        }

        try {

            $espectaculoRepo = new EspectaculoRepositorio();
            $espectaculosdb = $espectaculoRepo->getById($_GET['id']);

            $data = [];


            foreach ($espectaculosdb as $espectaculodb) {

                $espectaculo = new Espectaculo(
                    $espectaculodb['id'],
                    $espectaculodb['nombre'],
                    $espectaculodb['fInicio'],
                    $espectaculodb['fFin'],
                    $espectaculodb['duracion'],
                    $espectaculodb['idTeatro']
                );

                $funcionesRepo = new FunctionesRepositorio();
                $funcionesdb = $funcionesRepo->get($espectaculo->getId());

                $funciones = [];

                foreach ($funcionesdb as $funciondb) {
                    array_push($funciones, new Funcion($funciondb['id'], $funciondb['idEspectaculo'], $funciondb['fFuncion'], $funciondb['quedan']));
                }

                $espectaculo->setFunciones($funciones);
                array_push($data, $espectaculo);
            }

            if(sizeof($data) === 0){
                $error = '404 no se ha encontrado la función.';
            }

        } catch (PDOException $e) {
            $error = $e->getMessage();
        }

        require __DIR__ . '/../../app/plantillas/funciones.php';
    }
}
