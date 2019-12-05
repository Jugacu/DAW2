<?php
class Usuario
{
    private $usuario = '';
    private $pwd = '';

    public function __construct(array $usu) {
        if ($dat = $this->setUsuario($usu['usuario'])) {
            $errores['usuario'] = $dat;
        }

        if ($dat = $this->setPwd($usu['pwd'])) {
            $errores['pwd'] = $dat;
        }
        if (isset($errores)) {
            require_once __DIR__ . './usuarioException.php';
            throw new UsuarioException($errores, 'Error usuario');
        }
    }

    /**
     * @return string
     */
    public function getUsuario(): string
    {
        return $this->usuario;
    }

    /**
     * @param string $usuario
     */
    public function setUsuario(string $usuario)
    {
        if (empty($usuario)) {
            return 'Debe introducir un usuario';
        }
        $this->usuario = $usuario;
        return '';
    }

    /**
     * @return string
     */
    public function getPwd(): string
    {
        return $this->pwd;
    }

    /**
     * @param string $pwd
     */
    public function setPwd(string $pwd)
    {
        if (empty($pwd)) {
            return 'Debe introducir una contraseña';
        }
        $this->pwd = $pwd;
        return '';
    }


}
