<?php

require_once __DIR__ . '/Espectaculo.php';

class Teatro
{

    private $id;
    private $name;
    private $aforo;
    private $espectaculos;

    public function __construct(
        int $id,
        string $name,
        int $aforo,
        array $espectaculos
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->aforo = $aforo;
        $this->espectaculos = $espectaculos;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEspectaculos(): array {
        return $this->espectaculos;
    }
}
