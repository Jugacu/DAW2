<?php
class NoticiasController
{
    public function verNoticias()
    {
        require_once __DIR__ . '/../Repositorio/noticiasRepositorio.php';
        $noticias=(new noticiasRepositorio)->findAllNoticias();
        include_once __DIR__ . '/../../app/plantillas/noticias.php';
    }
}
