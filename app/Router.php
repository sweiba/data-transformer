<?php

namespace Test;

class Router
{
    const CONTROLLERS_NAMESPACE = 'Test\\Controllers\\';

    private $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function route()
    {

        $uri = $this->getUri();
        $controller = $this->routes[$uri];
        $exController = explode("@", $controller);
        $controllerClass = static::CONTROLLERS_NAMESPACE . $exController[0];
        $methodName = $exController[1];

        if (!class_exists($controllerClass))
            throw new \Exception("Controller " . $controllerClass . " does not exists");
        $oController = new $controllerClass;

        if (!method_exists($oController, $methodName))
            throw new \Exception("Method " . $methodName . " does not exists in class" . $controllerClass);

        return $oController->$methodName();
    }

    private function getUri()
    {
        return $_SERVER["REQUEST_URI"];
    }
}