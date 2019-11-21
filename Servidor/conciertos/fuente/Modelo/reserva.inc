<?php
//Las firmas de los metodos pueden tener nombre de servicio.
class Reserva
{
    private $dni = '';
    private $fecha = '';
    private $hora = '';
    private $idActuacion = 0;
    private $localidades = 0;
    private $pagado = false;

    public function __construct(array $datos, $nuevo = true)
    {   if ($nuevo) {
            if ($dat = $this->setDni($datos['dni'])) {
                $errores['dni'] = $dat;
            }
            if ($dat = $this->setLocalidades($datos['localidades'])) {
                $errores['localidades'] = $dat;
            }
            if (isset($errores)) {
                require_once __DIR__ . '/reservaException.inc';
                throw new ReservaException($errores, 'Reserva incorrecta');
            } else {
                $this->setHora();
                $this->setFecha();
                $this->setPagado($datos['pagado']);
                $this->setIdActuacion($datos['idAct']);
            }
        } else {
            $this->idReserva = $datos['idReserva'];
            $this->dni = $datos['DNI'];
            $this->fecha = $datos['Fecha'];
            $this->hora = $datos['Hora'];
            $this->idActuacion = $datos['idActuacion'];
            $this->localidades = $datos['Localidades'];
            $this->pagado = $datos['Pagado'];
        }
    }

    public function setDni(string $dni):string
    {
        $expreg = '/^\d{8}[ABCDEFGHJKLMNPQRSTW]$/';
        $aDni = strtoupper($dni);
        if (!preg_match($expreg, $aDni)) {
            if (empty($aDni)) {
                return 'Obligatorio, Debe introducir un D.N.I.';
            }
            return 'Formato de D.N.I. incorrecto' . $dni;
        } //Meter la rutina para verificar el dni
        $this->dni = $aDni;
        return '';
    }

    public function setFecha()
    {
        $this->fecha = date('Y-m-d');
    }
    public function setHora()
    {
        $this->hora = date('H:i:s');
    }
    public function setIdActuacion(int $idAct)
    {
        $this->idActuacion = $idAct;
    }
    public function setLocalidades(string $entradas):string
    {
        $expreg = '/^\d{1,2}$/';
        if (!preg_match($expreg, $entradas)) {
            if (empty($entradas)) {
                return 'Obligatorio, Debe introducir un número de entradas';
            }
            return 'Valor incorrecto, solo dos digitos';
        } elseif ((int) $entradas > 10) {
            return 'Solo se pueden comprar 10 localidades';
        } elseif ((int) $entradas == 0) {
            return 'Debe introducir un valor correcto';
        }
        $this->localidades = (int) $entradas;
        return '';
    }
    public function setPagado(bool $pagado)
    {
        $this->pagado = $pagado;
    }

    public function getDni(): string
    {
        return $this->dni;
    }
    public function getFecha(): string
    {
        return $this->fecha;
    }
    public function getHora(): string
    {
        return $this->hora;
    }
    public function getIdActuacion(): int
    {
        return $this->idActuacion;
    }
    public function getLocalidades(): int
    {
        return $this->localidades;
    }
    public function getPagado(): bool
    {
        return $this->pagado;
    }
}
