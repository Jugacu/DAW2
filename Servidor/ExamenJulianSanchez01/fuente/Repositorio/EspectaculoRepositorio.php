<?php

class EspectaculoRepositorio {

    public function get(int $idTeatro): array {

        try {
            $con = (new ConexionBd())->getConexion();
            $sql = 'select * from dbo.Espectaculo where idTeatro=:idTeatro and fFin >= :date';
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':idTeatro', $idTeatro);
            $stmt->bindValue(':date', date('Y-m-d'));
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            throw $e;
        } finally {
            $con = null;
            $stmt = null;
        }

    }

    public function getById(int $id): array {

        try {
            $con = (new ConexionBd())->getConexion();
            $sql = 'select * from dbo.Espectaculo where id=:id and fFin >= :date';
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':date', date('Y-m-d'));
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            throw $e;
        } finally {
            $con = null;
            $stmt = null;
        }

    }

}