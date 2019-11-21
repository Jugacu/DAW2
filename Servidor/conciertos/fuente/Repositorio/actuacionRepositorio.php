<?php
//De aquí sale la informacion para vista verActuaciones.php
class ActuacionRepositorio
{
    public function findAllActuaciones():array{
        //Consulta que extrae toda la tabla de actiaciones de grupos.
        $sql='SELECT idActuacion AS idAct, Fecha, Hora, Grupo, Precio, entradasDisponibles as Disponibles FROM Actuacion';
        //
        require_once __DIR__ . '/../../core/conexionBd.php';
        try{
            $con = (new ConexionBd())->getConexion();
            $snt = $con->prepare($sql);
            $snt->execute();
            //die(print_r( $snt->fetchAll(PDO::FETCH_ASSOC)));//Esto es para aprender que ocurre
            return $snt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $ex){
            throw $ex;
        }finally{
            $snt = null;
            $con = null;
        }
    }
}
