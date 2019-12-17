<?php

require_once __DIR__ . '/../Modelo/Reserva.php';

class ReservaRepositorio {

    public function add(Reserva $reserva) {
        try {
            $con = (new ConexionBd())->getConexion();
            $con->beginTransaction();
            $con->exec('set transaction isolation level Serializable');
            $sql = 'insert into dbo.Venta(idFuncion, tlfno, numEntradas) values (:idF, :telf, :amount)';
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':idF', $reserva->getIdFuncion());
            $stmt->bindValue(':telf', $reserva->getTelf());
            $stmt->bindValue(':amount', $reserva->getAmount());
            $stmt->execute();

            //Rebaja la cantidad de entradas disponibles
            $sql = 'select quedan from dbo.Funcion where id=:id';
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':id', $reserva->getIdFuncion());
            $stmt->execute();
            $row = $stmt->fetch();
            if($row['quedan'] === 0) {
                throw new Exception('Se acaban de agotar las entradas :(');
            }
            if($row['quedan'] - $reserva->getAmount() < 0){
                throw new Exception('No hay suficientes entradas, considera bajar su número');
            }
            $less = $row['quedan'] - $reserva->getAmount();
            $sql = 'update dbo.Funcion set quedan=:less where id=:id';
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':id', $reserva->getIdFuncion());
            $stmt->bindValue(':less', $less);
            $stmt->execute();

            $con->commit();
        } catch(PDOException $e) {
            $con->rollBack();
            throw $e;
        } finally {
            $stmt = null;
        }
    }

}