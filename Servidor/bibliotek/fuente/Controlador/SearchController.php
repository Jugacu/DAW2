<?php

require_once __DIR__ . '/../Repositorio/GenreRepository.php';
require_once __DIR__ . '/../Repositorio/BookRepository.php';

class SearchController
{
    public function index()
    {
        $genres = GenreRepository::getAllGenres();
        $books = [];

        if (isset($_POST['title']) || isset($_POST['genre'])) {
            $books = BookRepository::searchBooks($_POST['title'], $_POST['genre']);
        }

        require __DIR__ . '/../../app/plantillas/searcher.php';
    }
}
