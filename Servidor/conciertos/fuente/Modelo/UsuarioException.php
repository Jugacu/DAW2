<?php


class UsuarioException extends Exception
{
    private $errors = [];

    public function __construct(array $errs, string $ms)
    {
        parent::__construct($ms);
        $this->errors = $errs;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}

