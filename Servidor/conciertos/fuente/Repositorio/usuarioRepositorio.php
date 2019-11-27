<?php

require_once __DIR__ . '/../../core/conexionBd.php';
require_once __DIR__ . '/../Modelo/Usuario.php';

class usuarioRepositorio
{
    public function addUser(Usuario $user)
    {
        try {
            $sql = 'insert into Usuario (username, password) values (:username, :password)';
            $con = (new ConexionBd())->getConexion();

            $snt = $con->prepare($sql);
            $snt->bindValue(':username', $user->getUsername());
            $snt->bindValue(':password', $user->getPassword());

            $con->beginTransaction();
            $snt->execute();
            $con->commit();

        } catch (PDOException $ex) {
            throw $ex;
            $con->rollBack();

        } finally {
            $snt = null;
            $con = null;
        }
    }

    public function getUser(Usuario $user)
    {
        try {
            $sql = 'select * from Usuario where username = :username';
            $con = (new ConexionBd())->getConexion();

            $snt = $con->prepare($sql);
            $snt->bindValue(':username', $user->getUsername());
            $snt->execute();

            $data = $snt->fetch(PDO::FETCH_ASSOC);
            return $data;

        } catch (PDOException $ex) {
            throw $ex;
        } finally {
            $snt = null;
            $con = null;
        }
    }

}
