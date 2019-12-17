<?php

require_once __DIR__ . '/ReservaException.php';

class Reserva {

    private $idFuncion;
    private $tlf;
    private $amount;

    public function __construct(
        int $idFuncion, int $tlf, int $amount
    )
    {
        $this->setIdFuncion($idFuncion);
        $this->setTlf($tlf);
        $this->setAmount($amount);
    }

    public function getIdFuncion(){
        return $this->idFuncion;
    }

    public function getTelf(){
        return $this->tlf;
    }

    public function getAmount(){
        return $this->amount;
    }

    private function setIdFuncion($id){
        if(!isset($id) || !is_numeric($id) || $id <= 0) {
            throw new ReservaException(['Funcion inválida']);
        }
        $this->idFuncion = $id;
    }


    private function setTlf($tlf){
        $regex = '/^[6|7][0-9]{8}$/';
        if(!preg_match($regex, strval($tlf))) {
            throw new ReservaException(['Teléfono inválido']);
        }
        $this->tlf = $tlf;
    }

    private function setAmount($amount) {
        if(!isset($amount) || !is_numeric($amount) || $amount <= 0) {
            throw new ReservaException(['Cantidad inválida']);
        }
        $this->amount = $amount;
    }

}