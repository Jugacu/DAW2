<?php

//Include script
foreach (glob(__DIR__ . '/../controllers/*.php') as $filename) {
    try {
        require_once $filename;
    } catch (Exception $e) {
        throw $e;
    }
}

class Route
{
    private static $routes = Array();
    private static $pathNotFound = null;
    private static $methodNotAllowed = null;

    public static function add($expression, $function, $method = 'get')
    {
        array_push(self::$routes, [
            'expression' => $expression,
            'function' => $function,
            'method' => $method
        ]);
    }

    public static function get($path, $function)
    {
        self::add($path, $function);
    }

    public static function post($path, $function)
    {
        self::add($path, $function, 'post');
    }

    public static function pathNotFound($function)
    {
        self::$pathNotFound = $function;
    }

    public static function methodNotAllowed($function)
    {
        self::$methodNotAllowed = $function;
    }

    public static function run($basepath = '/', $case_matters = false, $trailing_slash_matters = false, $multimatch = false)
    {
        $parsed_url = parse_url($_SERVER['REQUEST_URI']);

        if (isset($parsed_url['path']) && $parsed_url['path'] !== '/') {
            if ($trailing_slash_matters) {
                $path = $parsed_url['path'];
            } else {
                $path = rtrim($parsed_url['path'], '/');
            }
        } else {
            $path = '/';
        }

        $method = $_SERVER['REQUEST_METHOD'];

        $path_match_found = false;

        $route_match_found = false;

        foreach (self::$routes as $route) {
            if ($basepath != '' && $basepath != '/') {
                $route['expression'] = '(' . $basepath . ')' . $route['expression'];
            }

            // Find string start
            $route['expression'] = '^' . $route['expression'];

            // Find string end
            $route['expression'] = $route['expression'] . '$';

            // Check regex expression
            if (preg_match('#' . $route['expression'] . '#' . ($case_matters ? '' : 'i'), $path, $matches)) {
                $path_match_found = true;

                foreach ((array)$route['method'] as $allowedMethod) {
                    if (strtolower($method) == strtolower($allowedMethod)) {
                        array_shift($matches);

                        if ($basepath != '' && $basepath != '/') {
                            array_shift($matches);
                        }

                        try {
                            $action = Route::parse($route['function']);
                        } catch (Exception $e) {
                            throw $e;
                        }

                        call_user_func([$action[0], $action[1]], $matches);

                        $route_match_found = true;

                        // Stop checking other routes
                        break;
                    }
                }
            }

            if ($route_match_found && !$multimatch) {
                break;
            }
        }

        // No matching route has found
        if (!$route_match_found) {
            // But matching path exists
            if ($path_match_found) {
                if (self::$methodNotAllowed) {
                    call_user_func_array(self::$methodNotAllowed, [$path, $method]);
                }
            } else if (self::$pathNotFound) {
                call_user_func_array(self::$pathNotFound, Array($path));
            }
        }

    }

    private static function parse($expression): array
    {
        $action = explode("@", $expression);

        if (sizeof($action) !== 2) {
            throw new Exception('Cannot parse the route \'' . $expression . '\', check your sintax.');
        }

        if (!method_exists($action[0], $action[1])) {
            throw new Exception('Method \'' . $action[1] . '\' not defined in controller \'' . $action[0] . '\'.');
        }

        return $action;
    }

}
