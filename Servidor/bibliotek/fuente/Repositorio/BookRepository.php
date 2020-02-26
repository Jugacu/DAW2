<?php

require_once __DIR__ . '/../../core/conexionBd.inc';
require_once __DIR__ . '/../Modelo/Genre.php';
require_once __DIR__ . '/../Modelo/Book.php';

class BookRepository
{
    /**
     * @return Book[]
     */
    public static function getAllBooks(): iterable
    {
        $books = [];

        try {
            $con = (new ConexionBd())->getConexion();
            $sql = 'select *, libro.id as bookId from libro inner join genero on libro.idGenero = genero.id';
            $stmt = $con->prepare($sql);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($data as $datum) {
                $genre = new Genre($datum['idGenero'], $datum['nombre'], $datum['resumen']);
                $book = new Book($datum['bookId'], $datum['titulo'], $datum['autor'], $genre, $datum['idioma'], $datum['descripcion']);
                $books[] = $book;
            }

        } catch (PDOException $e) {
            throw $e;
        } finally {
            $con = null;
            $stmt = null;
        }

        return $books;
    }

    /**
     * @return Book[]
     */
    public static function searchBooks(string $title, string $genre): iterable
    {
        $books = [];

        try {
            $con = (new ConexionBd())->getConexion();

            $sql = "select *, libro.id as bookId from libro inner join genero on libro.idGenero = genero.id where libro.titulo like '%'+:title+'%' and genero.nombre like '%'+:genre+'%'";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':genre', $genre);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($data as $datum) {
                $genre = new Genre($datum['idGenero'], $datum['nombre'], $datum['resumen']);
                $book = new Book($datum['bookId'], $datum['titulo'], $datum['autor'], $genre, $datum['idioma'], $datum['descripcion']);
                $books[] = $book;
            }

        } catch (PDOException $e) {
            throw $e;
        } finally {
            $con = null;
            $stmt = null;
        }

        return $books;
    }
}
