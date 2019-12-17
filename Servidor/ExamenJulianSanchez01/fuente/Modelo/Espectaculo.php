<?php 

class Espectaculo {
    

    private $id;
    private $nombre;
    private $fInicio;
    private $fFin;
    private $duracion;
    private $idTeatro;
    private $funciones = [];

    public function __construct(
        int $id, string $nombre, string $fInicio, string $fFin, string $duracion, int $idTeatro 
    )
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->fInicio = $fInicio;
        $this->fFin = $fFin;
        $this->duracion = $duracion;
        $this->idTeatro = $idTeatro;
    }

    public function setFunciones(array $funciones) {
        $this->funciones = $funciones;
    }

    public function getFunciones(): array {
        return $this->funciones;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->nombre;
    }

    public function getFFin(): string {
        return $this->fFin;
    }

    public function getFInicio(): string {
        return $this->fInicio;
    }

    public function getDuracion(): string {
        return $this->duracion;
    }
}