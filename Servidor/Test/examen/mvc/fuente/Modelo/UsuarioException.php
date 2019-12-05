<?php

class UsuarioException extends Exception {
  private $errores = [];

  public function __contruct($errores, $ms) {
    parent::__construct($ms);
    $this->$errores = $errores;
  }

  public function getErrores() {
    return $this->errores;
  }
}