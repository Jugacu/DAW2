<?php
class NoticiasRepositorio
{
    public function findAllNoticias()
    {
        //Extraigo de la base de datos el titular y la noticia. Todas.
        $sql = 'SELECT idNoticia AS idNot, titular, desarrollo FROM Noticias';
        //incluyo el archivo de conexion a la base de datos.
        require_once __DIR__ . '/../../core/conexionBd.inc';
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