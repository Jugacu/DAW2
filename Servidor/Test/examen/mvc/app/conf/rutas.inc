<?php

// Vector multidimensional con rutas a controlador y método que debe
// atender cada enlace
/* formato:
    Primera dimensaión: nombre del enlace pasado mediante variable GET 'ctl'
     'nombreEnlace' => array() segunda dimesion con información del controlador
                       que atiende esa petición, clave 'controller', y del
                       método concreto que está especializado en su tratamiento,
                       clave 'action'
  Se debe agregar una ruta por cada valor diferente que tome la variable 'ctl'.
  La clave 'inicio' referencia la página home de la aplicación y especifica
    el controlador que debe decidir cuál es la vista que se debe mostrar
*/
$mapeoRutas =
  array(
    'inicio' => array('controller' => 'defaultController', 'action' => 'inicio'),
    'noticias' => array('controller' => 'newsController', 'action' => 'showNews'),
    'modify' => array('controller' => 'newsController', 'action' => 'modifyNews'),
    'registrar' => array('controller' =>'usuarioController', 'action' =>'registro'),
    'login' => array('controller' =>'usuarioController', 'action' =>'login'),
  );
