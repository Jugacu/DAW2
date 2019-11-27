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
}
