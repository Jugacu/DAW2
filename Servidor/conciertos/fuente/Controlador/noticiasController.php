<?php

require_once __DIR__ . '/../Repositorio/noticiasRepositorio.php';

class NoticiasController
{
    public function verNoticias()
    {
        $noticias = (new noticiasRepositorio)->findAllNoticias();
        include_once __DIR__ . '/../../app/plantillas/noticias.php';
    }

    public function verNoticias_admin()
    {
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin' || (isset($_GET['edit']) && isset($_GET['delete']))) {
            header('Location: /?ctl=noticias');
        }

        $repo = new NoticiasRepositorio();
        $errors = [];
        // Noticia por defecto
        $noticia = [
            'titular' => 'Nueva noticia',
            'desarrollo' => ''
        ];


        //NUEVA
        if (!isset($_GET['edit']) && !isset($_GET['delete'])) {
            if (isset($_POST['create'])) {
                try {
                    $repo->createNew($_POST['titular'], $_POST['desarrollo']);
                    header('Location: /?ctl=noticias');
                } catch (Exception $e) {
                    array_push($errors, 'Error al crear la noticia');
                }
            }
        }


        // Editar
        if (isset($_GET['edit'])) {
            //POST
            if (isset($_POST['edit'])) {
                try {
                    $repo->editNew($_GET['edit'], $_POST['titular'], $_POST['desarrollo']);
                } catch (Exception $e) {
                    array_push($errors, 'Error al editar la noticia');
                }
            }

            try {
                $noticia = $repo->getNew($_GET['edit']);
            } catch (Exception $e) {
                array_push($errors, $e->getMessage());
            }
        }

        // Borrar
        if (isset($_GET['delete'])) {
            try {
                $repo->delete($_GET['delete']);
                header('Location: /?ctl=noticias');
            } catch (Exception $e) {
                array_push($errors, 'Error al borrar la noticia');
            }
        }

        include_once __DIR__ . '/../../app/plantillas/noticias_admin.php';
    }
}
