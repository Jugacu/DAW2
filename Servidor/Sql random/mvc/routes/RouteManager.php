<?php

//Include script
foreach (glob(__DIR__ . '/../controllers/*.php') as $filename) {
    try {
        require_once $filename;
    } catch (Exception $e) {
        throw $e;
    }
}

class RouteManager
{

    public static $routes = [
        '' => 'HomeController@index',
        'ej1' => 'EjController@ej1'
    ];

    public static function exec($route)
    {
        if (!isset(RouteManager::$routes[$route])) {
            throw new Exception('Route not defined.');
        }

        $action = explode("@", RouteManager::$routes[$route]);

        if (sizeof($action) !== 2) {
            throw new Exception('Cannot parse the route \'' . $route . '\', check your sintax.');
        }

        if (!method_exists($action[0], $action[1])) {
            throw new Exception('Method \'' . $action[1] . '\' not defined in controller \'' . $action[0] . '\'.');
        }

        call_user_func([new $action[0], $action[1]]);
    }

}
