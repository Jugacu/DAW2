<?php

class ReservaException extends Exception{

    private $errors;

    public function __construct(array $errors)
    {
        $this->errors = $errors;
    }

    public function getErrors(): array {
        return $this->errors;
    }
}