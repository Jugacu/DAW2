<?php
class ReservaRepositorio
{
    public function addReserva(Reserva $resv){
        $sql="INSERT INTO reserva (dni,fecha,hora,idActuacion,localidades,pagado)
                   VALUES (:dni, :fecha, :hora, :idActuacion, :entradas, :pagado)";
        require_once __DIR__ . '/../../core/conexionBd.inc';
        try{
            $con = (new ConexionBd())->getConexion(); // conexion
            $snt = $con->prepare($sql); //preparacion
            $snt->bindValue(':dni', $resv->getDni());
            $snt->bindValue(':fecha', $resv->getFecha());
            $snt->bindValue(':hora', $resv->getHora());
            $snt->bindValue(':idAct', $resv->getIdActuacion());
            $snt->bindValue(':entradas', $resv->getLocalidades());
            $snt->bindValue(':pagado', $resv->getPagado());
            $con->begin_transaction();
            $snt->execute();
            $con->commit();
            //die(print_r( $snt->fetchAll(PDO::FETCH_ASSOC)));//Esto es para aprender que ocurre
            return $snt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $ex){
            throw $ex;//propaga la excepcion
        }finally{
            $snt = null;//liberar recursos
            $con = null;
        }
    }
}