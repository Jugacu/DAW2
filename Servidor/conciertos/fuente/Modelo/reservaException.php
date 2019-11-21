<?php
class ReservaException extends Exception
{
    private $errores = [];

    public function __construct(array $errs, string $ms)
    {
        parent::__construct($ms);
        $this->errores = $errs;
    }

    public function getErrores(): array
    {
        return $this->errores;
    }
}
