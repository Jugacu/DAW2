<?php
class ReservaController
{
    public function reservar(array $act){
        //print_r($idAct);
        $exito=false;
        if (isset($_POST['enterado'])) {
            header("location: index.php");
          }
        if(isset($_POST['Enviar'])){
            //echo 'Entraaaa';
            //$exito = false;
            require_once __DIR__ . '/../Modelo/reserva.inc'; //recibe los datos
            $reser = $_POST['reser'];
            $reser['idAct'] = $act['idAct'];
            $reser['pagado'] = false;
            $exito=true;
            try{
                $reservaObj = new Reserva($reser); //crea un objetos
                require_once __DIR__ . '/../Repositorio/reservaRepositorio';
                (new ReservaRepositorio)->addReserva($reserObj);
                $exito = true;
                header("location: index.php");
            }catch (PDOException $ex){
                $errores = $ex->getErrores();
                $errores['mens'] = $ex->getMenssage();
            }catch(ReservaException $ex){
                $errores = $ex->getErrores();
                $errores['mens'] = $ex->getMenssage();
        
              }

        }
        require_once __DIR__ . '/../../app/plantillas/reservar.php';
    }
}