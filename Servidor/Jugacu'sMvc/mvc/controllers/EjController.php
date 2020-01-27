<?php

class EjController
{
    public function ej1()
    {
        $con = DBManager::getConnexion();
        $sql = 'select isNull(Comision, 0) as Comision, Apellido + \', \' + Nombre as Nombre, Salario from Empleado where Num_Hijo > 3 order by Comision, Nombre';
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        ViewManager::view('ej1View', ['result' => $result]);
    }
}
