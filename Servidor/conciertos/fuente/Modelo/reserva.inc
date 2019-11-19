<?php
//Las firmas de los metodos pueden tener nombre de servicio.
class Reserva
{
    private $dni='';
    private $fecha='';
    private $hora='';
    private $idActuacion=0;
    private $localidades=0;
    private $pagado=false;

    public function __contruct(array $datos){
        if(!$dat=$this->setDni($datos['dni'])){
            $errores['dni']=$dat;
        }
        if(!$dat=setLocalidades($datos['localidades'])){
            $errores['localidades']=$dat;
        }
        if(isset($errores)){
            throw new ReservaException($errores,'Reserva incorrecta');
            throw new ReservaException($errores, 'Reserva incorrecta');
        }else{
            $this->setHora();
            $this->setFecha();
            $this->setPagado($datos['pagado']);
            $this->setIdActuacion($datos['idAct']);
        }
    }

   public function setDni(string $dni)
   {
    $expreg='/^\d{8}[ABCDEFGHJKLMNPQRSTW]$/';
    $aDni=strtoupper($dni);
    if(!preg_match($expreg,$adni)){
        if (empty($aDni)) {
            return 'Obligatorio, Debe introducir un D.N.I.';
        }
        return 'Formato de D.N.I. incorrecto' . $dni;
    }//Meter la rutina para verificar el dni
    $this->dni=$aDni;
    return '';
   }

   public function setFecha(string $fecha)
   {
    $this->fecha=date('Y-m-d');
   }
   public function setHora(string $hora)
   {
    $this->hora=date('H:i:s');
   }
   public function setIdActuacion(int $idAct)
   {
    $this->idActuacion=$idAct;
   }
   public function setLocalidades(int $entradas):string
   {
    $expreg='/^\d{2}$/';
    if(!preg_match($expreg,$entradas)){
        if (empty($entradas)) {
            return 'Obligatorio, Debe introducir un numero de entradas';
        }
        return 'Valor incorrecto, solo dos digitos';
    }elseif((int)$entradas > 10){
        return 'Solo se pueden comprar 10 localidades';
    }
    $this->localidades = (int)$entradas;
    return '';
   }
   public function setPagado(bool $pagado)
   {
    $this->pagado=$pagado;
   }

   public function getDni():string
   {
    return $this->dni;
   }
   public function getFecha():string{
    return $this->fecha;
   }
   public function getHora():string{
    return $this->hora;
   }
   public function getIdActuacion():int{
    return $this->idactuacion;
   }
   public function getLocalidades():int{
    return $this->localidades;
   }
   public function getPagado():bool{
    return $this->pagado;
   }

}