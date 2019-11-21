<?php
class ReservaRepositorio
{
    public function addReserva(Reserva $resv)
    {
        $sql = "INSERT INTO reserva (dni,fecha,hora,idActuacion,localidades,pagado)
                   VALUES (:dni, :fecha, :hora, :idActuacion, :entradas, :pagado)";
        require_once __DIR__ . '/../../core/conexionBd.inc';
        try {
            $con = (new ConexionBd())->getConexion(); // conexion
            $snt = $con->prepare($sql); //preparacion
            $snt->bindValue(':dni', $resv->getDni());
            $snt->bindValue(':fecha', $resv->getFecha());
            $snt->bindValue(':hora', $resv->getHora());
            $snt->bindValue(':idActuacion', $resv->getIdActuacion());
            $snt->bindValue(':entradas', $resv->getLocalidades());
            $snt->bindValue(':pagado', $resv->getPagado());
            $con->beginTransaction();

            $snt->execute();

            $con->commit();

        } catch (PDOException $ex) {
            throw $ex; //propaga la excepcion
            $con->rollBack();
        } finally {
            $snt = null; //liberar recursos
            $con = null;
        }
    }
}
