<?php

// Ejemplo de controlador para página home de la aplicación
class UsuarioController
{
    public function registro()
    {
        if (isset($_POST['enteradoRegistrado'])) {
            header('localtion: index.php');
        }

        if (isset($_POST['registrar'])) {
            try {
                $usu = $_POST['usuario'];
                require_once __DIR__ . '/../Modelo/Usuario.php';
                $objUsu = new Usuario($usu);
                require_once __DIR__ . '/../Repositorio/usuarioRepositorio.php';
                (new UsuarioRepositorio)->regUsuario($objUsu);
                $exito = true;
            } catch (PDOException $ex) {
                $errores = $ex->getErrores;
                $errores['mens'] = $ex->getMessage;
                require_once __DIR__ . '/../Modelo/usuarioException.php';
            } catch (UsuarioException $ex) {
                $errores = $ex->getErrores;
                $errores['mens'] = $ex->getMessage;
            }
        }
        require_once __DIR__ . '/../../app/plantillas/registrar.php';
    }

    public function login()
    {

        if (isset($_POST['login'])) {
            try {
                $usu = $_POST['usuario'];
                require_once __DIR__ . '/../Modelo/Usuario.php';
                $objUsu = new Usuario($usu);
                require_once __DIR__ . '/../Repositorio/usuarioRepositorio.php';
                $usuData = (new UsuarioRepositorio)->loginUsuario($objUsu);
                $_SESSION['usuario'] = $usuData['usuario'];
                header('localtion: index.php');
            } catch (PDOException $ex) {
                $errores = $ex->getErrores;
                $errores['mens'] = $ex->getMessage;
                require_once __DIR__ . '/../Modelo/usuarioException.php';
            } catch (UsuarioException $ex) {
                $errores = $ex->getErrores;
                $errores['mens'] = $ex->getMessage;
            }
        }
        require_once __DIR__ . '/../../app/plantillas/login.php';
    }
}
