<?php

require_once __DIR__ . '/../../core/conexionBd.inc';
require_once __DIR__ . '/../Modelo/Genre.php';


class GenreRepository
{

    /**
     * @return Genre[]
     */
    public static function getAllGenres(): iterable
    {
        $genres = [];

        try {
            $con = (new ConexionBd())->getConexion();
            $sql = 'select * from genero';
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($data as $datum) {
                $genres[] = new Genre($datum['id'], $datum['nombre'], $datum['descripcion']);
            }

        } catch (PDOException $e) {
            throw $e;
        } finally {
            $con = null;
            $stmt = null;
        }

        return $genres;
    }
}
