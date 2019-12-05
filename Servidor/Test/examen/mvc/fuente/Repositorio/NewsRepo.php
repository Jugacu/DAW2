<?php

require_once __DIR__ . '/../../core/conexionBd.inc';
require_once __DIR__ . '/../Modelo/Notice.php';


class NewsRepo
{

    public function getNews(): array
    {
        $sql = "SELECT * FROM noticias";
        try {
            $db = (new ConexionBd())->getConexion();
            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            throw $th;
        } finally {
            $stmt = null;
            $db = null;
        }
    }

    public function editNew(Notice $edited_new) {
        $sql = "update noticias set noticias.titulo=:title, noticias.desc=:desc where id=:id";
        try {
            $db = (new ConexionBd())->getConexion();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $edited_new->getId());
            $stmt->bindValue(':title', $edited_new->getTitle());
            $stmt->bindValue(':desc', $edited_new->getDescr());
            $stmt->execute();

        } catch (PDOException $th) {
            throw $th;
        } finally {
            $stmt = null;
            $db = null;
        }
    }

    public function deleteNew(int $id) {
        $sql = "delete from noticias where id=:id";
        try {
            $db = (new ConexionBd())->getConexion();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        } catch (PDOException $th) {
            throw $th;
        } finally {
            $stmt = null;
            $db = null;
        }
    }
}
