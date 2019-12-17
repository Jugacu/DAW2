<?php

class Funcion {


    private $id;
    private $idEspectaculo;
    private $fFuncion;
    private $quedan;

    public function __construct(int $id, int $idEspectaculo, string $fFuncion, int $quedan)
    {
        $this->id = $id;
        $this->idEspectaculo = $idEspectaculo;
        $this->fFuncion = $fFuncion;
        $this->quedan = $quedan;
    }

    public function getFFuncion(): string {
        return $this->fFuncion;
    }

    public function getQuedan(): int {
        return $this->quedan;
    }

    public function getId(): int {
        return $this->id;
    }


}