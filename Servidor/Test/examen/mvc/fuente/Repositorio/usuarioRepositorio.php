<?php
class UsuarioRepositorio {
  public function regUsuario(Usuario $usu) {
            $sql = "INSERT INTO Usuario (usuario, pwd) 
            VALUES (:usuario, :pwd)";

            try {              
              require_once __DIR__ . '/../../core/conexionBd.inc';
              $con = (new ConexionBd)->getConexion();
              $snt = $con->prepare($sql);
              $snt->bindValue(':usuario', $usu->getUsuario());
              $snt->bindValue(':pwd', $usu->getPwd());
              $con->beginTransaction();
              $snt->execute();
              $con->commit();
            } catch (PDOException $ex) {
                throw $ex;              
            } finally {
              $con = null;
              $snt = null;
            }
    }           
  

  public function loginUsuario(Usuario $usu) {
            $sql = "SELECT usuario, pwd 
                    FROM Usuario
                    WHERE usuario = :usuario AND pwd = :pwd";
            try {              
              require_once __DIR__ . '/../../core/conexionBd.inc';
              $con = (new ConexionBd)->getConexion();
              $snt = $con->prepare($sql);
              $snt->bindValue(':usuario', $usu->getUsuario());
              $snt->bindValue(':pwd', $usu->getPwd());
              $snt->execute();
              return $snt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $ex) {
                throw $ex;              
            } finally {
              $con = null;
              $snt = null;
            }            
  }
}