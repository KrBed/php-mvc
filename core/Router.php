<?php

class Router
{
    protected $routes = [
        "GET" => [],
        "POST" => []
    ];

    public static function load($file)
    {
        $router = new self;

        require $file;

        return $router;
    }

    public function get($uri, $controller)
    {
        $this->routes["GET"][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes["POST"][$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {

        if (array_key_exists($uri, $this->routes[$requestType])) {
            $parameters = explode('@', $this->routes[$requestType][$uri]);

            return $this->callAction($parameters[0], $parameters[1]);
        }
        throw new Exception("No routes defined for this {$uri}");
    }

    public function callAction($controller, $method)
    {

        $controller = new $controller();
        if (!method_exists($controller, $method)) {
            throw new Exception("{$controller} does not respond to the {action} action");
        }
        return $controller->$method();
    }
}
