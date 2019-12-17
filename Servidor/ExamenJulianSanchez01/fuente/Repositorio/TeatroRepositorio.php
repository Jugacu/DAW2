<?php

require_once __DIR__ . '/../../core/conexionBd.inc';

class TeatroRepositorio {

    public function getAll(): array {

        try {
            $con = (new ConexionBd())->getConexion();
            /*$sql = 'select dbo.Teatro.id as idTeatro, dbo.Teatro.nombre as nombreTeatro, dbo.Teatro.aforo as aforoTeatro, dbo.Espectaculo.id as idEspec
             from dbo.Teatro join dbo.Espectaculo on dbo.Espectaculo.idTeatro = idTeatro';*/

            $sql = 'select * from dbo.Teatro';

            $stmt = $con->prepare($sql);
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