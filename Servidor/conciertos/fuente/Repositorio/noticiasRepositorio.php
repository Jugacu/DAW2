<?php

require_once __DIR__ . '/../../core/conexionBd.php';

class NoticiasRepositorio
{
    public function findAllNoticias()
    {
        //Extraigo de la base de datos el titular y la noticia. Todas.
        $sql = 'SELECT idNoticia AS idNot, titular, desarrollo FROM Noticias order by idNot desc';
        //incluyo el archivo de conexion a la base de datos.
        try {
            $con = (new ConexionBd())->getConexion();
            $snt = $con->prepare($sql);
            $snt->execute();
            //die(print_r( $snt->fetchAll(PDO::FETCH_ASSOC)));//Esto es para aprender que ocurre
            return $snt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            throw $ex;
        } finally {
            $snt = null;
            $con = null;
        }
    }

    public function getNew(int $id): array
    {
        $sql = 'SELECT idNoticia AS idNot, titular, desarrollo FROM Noticias where idNoticia = :id';
        try {
            $con = (new ConexionBd())->getConexion();
            $snt = $con->prepare($sql);
            $snt->bindParam(':id', $id);

            $snt->execute();
            $data = $snt->fetch(PDO::FETCH_ASSOC);

            if (!$data) {
                throw  new Exception('No se encuentra la noticia');
            }

            return $data;
        } catch (PDOException $ex) {
            throw $ex;
        } finally {
            $snt = null;
            $con = null;
        }
    }

    public function createNew(string $title, string $des): void
    {
        $sql = 'insert into noticias (titular, desarrollo) values (:title, :des) ';

        try {
            $con = (new ConexionBd())->getConexion();
            $snt = $con->prepare($sql);
            $snt->bindParam(':title', $title);
            $snt->bindParam(':des', $des);

            $snt->execute();
        } catch (PDOException $ex) {
            throw $ex;
        } finally {
            $snt = null;
            $con = null;
        }
    }

    public function editNew(int $id, string $title, string $des): void
    {
        $sql = 'update noticias set titular=:title, desarrollo=:des where idnoticia=:id';

        try {
            $con = (new ConexionBd())->getConexion();
            $snt = $con->prepare($sql);
            $snt->bindParam(':id', $id);
            $snt->bindParam(':title', $title);
            $snt->bindParam(':des', $des);

            $snt->execute();
        } catch (PDOException $ex) {
            throw $ex;
        } finally {
            $snt = null;
            $con = null;
        }
    }

    public function delete($id): void
    {
        $sql = 'delete from noticias where idnoticia=:id';

        try {
            $con = (new ConexionBd())->getConexion();
            $snt = $con->prepare($sql);
            $snt->bindParam(':id', $id);
            $snt->execute();
        } catch (PDOException $ex) {
            throw $ex;
        } finally {
            $snt = null;
            $con = null;
        }
    }
}
