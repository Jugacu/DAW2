<?php

class authController
{
    public function verAuth()
    {

        if (isset($_POST['register'])) {
            require_once __DIR__ . '/../Modelo/Usuario.php';
            require_once __DIR__ . '/../Modelo/UsuarioException.php';
            require_once __DIR__ . '/../Repositorio/usuarioRepositorio.php';

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


        require __DIR__ . '/../../app/plantillas/auth/auth.php';
    }
}
