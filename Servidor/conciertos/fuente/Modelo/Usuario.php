<?php


class Usuario
{
    private $username;
    private $password;

    public function __construct(array $data)
    {
        $this->setUsername($data['username']);
        $this->setPassword($data['password']);
    }

    public function setUsername(string $username): void
    {
        $regex = '^[a-z0-9][a-z0-9_]{0,14}[a-z0-9]$^';
        if (!preg_match($regex, $username)) {
            throw new UsuarioException([
                'username' => $username
            ], 'El nombre de usuario ha de ser entre 4 y 15 caracteres. Solo minusculas');
        }
        $this->username = $username;
    }

    public function setPassword(string $password): void
    {
        $regex = '^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$^';
        if (!preg_match($regex, $password)) {
            throw new UsuarioException([
                'password' => $password
            ], 'Introduce una contraseña segura.');
        }


        $password = password_hash($password, PASSWORD_BCRYPT);
        $this->password = $password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

}
