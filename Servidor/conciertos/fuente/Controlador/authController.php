<?php
require_once __DIR__ . '/../Modelo/Usuario.php';
require_once __DIR__ . '/../Modelo/UsuarioException.php';
require_once __DIR__ . '/../Repositorio/usuarioRepositorio.php';

class authController
{
    public function verAuth()
    {

        if (isset($_GET['logout'])) {
            session_destroy();
            header('Location: /?ctl=auth');
        }

        if (isset($_POST['register'])) {

            $errors = [];

            try {
                $user = new Usuario($_POST['reg']);
                $repo = new usuarioRepositorio();

                $repo->addUser($user);
                $registered = 1;

            } catch (UsuarioException $e) {
                array_push($errors, $e->getMessage());

            } catch (Exception $e) {
                array_push($errors, 'Ese usuario ya existe.');

            }
        }


        if (isset($_POST['log'])) {

            $errors = [];

            try {
                $user = new Usuario($_POST['log']);
                $repo = new usuarioRepositorio();

                $db_user = $repo->getUser($user);

                if ($db_user) {
                    if (password_verify($_POST['log']['password'], $db_user['password'])) {
                        $_SESSION['rol'] = $db_user['rol'];
                        header('Location: /?ctl=noticias');
                    } else {
                        throw new Exception('Usuario o contraseña incorrectos');
                    }

                } else {
                    throw new Exception('Usuario o contraseña incorrectos');
                }

            } catch (Exception $e) {
                array_push($errors, $e->getMessage());
            }
        }

        require __DIR__ . '/../../app/plantillas/auth/auth.php';
    }
}
