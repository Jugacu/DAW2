<?php

require_once __DIR__ . '/../Modelo/Reserva.php';
require_once __DIR__ . '/../Modelo/ReservaException.php';
require_once __DIR__ . '/../Repositorio/ReservaRepositorio.php';

class ReservaController
{


    public function show()
    {
        /*
            Comprobación del GET
        */
        if (!isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])) {
            header('Location: index.php?ctl=inicio');
        }


        /*
            POST
        */
        if (isset($_POST['res'])) {
            try {
                $reserva = new Reserva($_GET['id'], $_POST['res']['telf'], $_POST['res']['amount']);
                $repo = new ReservaRepositorio();
                $repo->add($reserva);

                $success = true;
            } catch (ReservaException $e) {
                $error = $e->getErrors()[0];
            } catch (Exception $e) {
                $error = $e->getMessage();
            }
        }

        require_once __DIR__ . '/../../app/plantillas/reserva.php';
    }
}
