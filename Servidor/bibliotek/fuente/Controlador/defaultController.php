<?php

require_once __DIR__ . '/../Repositorio/BookRepository.php';

// Ejemplo de controlador para página home de la aplicación
class DefaultController
{
    public function inicio()
    {
        $books = BookRepository::getAllBooks();
        require __DIR__ . '/../../app/plantillas/inicio.php';
    }
}
