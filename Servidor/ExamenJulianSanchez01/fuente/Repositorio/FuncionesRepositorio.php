<?php

class FunctionesRepositorio {


    public function get(int $idEspectaculo):array {

        try {
            $con = (new ConexionBd())->getConexion();
            $sql = 'select * from dbo.Funcion where idEspectaculo=:id and fFuncion >= :date';
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':id', $idEspectaculo);
            $stmt->bindValue(':date', date('Y-m-d'));
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            throw $e;
        }

    }

    
    public function getById(int $id):array {

        try {
            $con = (new ConexionBd())->getConexion();
            $sql = 'select * from dbo.Funcion where id=:id and fFuncion >= :date';
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':date', date('Y-m-d'));
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            throw $e;
        }

    }


}