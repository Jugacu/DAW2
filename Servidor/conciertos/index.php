<?php
//index.php
session_start();
//error_reporting(E_ALL);

require_once __DIR__ . '/fuente/Controlador/defaultController.php'; /*controladores */
require_once __DIR__ . '/app/conf/rutas.php'; /*Ubicación del archivo de rutas*/
require_once __DIR__ . '/fuente/Controlador/actuacionController.php';
require_once __DIR__ . '/fuente/Controlador/reservaController.php';
require_once __DIR__ . '/fuente/Controlador/noticiasController.php';

// Parseo de la ruta
if (isset($_GET['ctl'])) {
    if (isset($mapeoRutas[$_GET['ctl']])) {
        $ruta = $_GET['ctl'];
        $param = isset($_GET['act']) ? unserialize(urldecode(stripslashes($_GET['act']))) : '';//equivale a isset $_GET
    } else {
        header('Status: 404 Not Found');
        echo '<html><body><h1>Error 404: No existe la ruta <i>' .
            $_GET['ctl'] .
            '</p></body></html>';
        exit;
    }
} else {
    $ruta = 'inicio';
}

$controlador = $mapeoRutas[$ruta];
// Ejecución del controlador asociado a la ruta

if (method_exists($controlador['controller'], $controlador['action'])) {
    if (empty($param)) {
        call_user_func(array(new $controlador['controller'], $controlador['action']));
    } else {
        call_user_func(array(new $controlador['controller'], $controlador['action']), $param);
    }
} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: El controlador <i>' .
        $controlador['controller'] .
        '->' . $controlador['action'] .
        '</i> no existe</h1></body></html>';
}
