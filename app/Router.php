<?php

namespace Test;

class Router
{
    const CONTROLLERS_NAMESPACE = 'Test\\Controllers\\';

    private $route;

    public function __construct(Route $route)
    {
        $this->route = $route;
    }

    public function route()
    {
        $class = $this->getClass();
        $method = $this->getMethod($class);

        return (new $class)->$method();
    }

    private function getClass()
    {
        $class = static::CONTROLLERS_NAMESPACE . $this->route->getClass();

        if (!class_exists($class))
            throw new \Exception("Controller " . $class . " does not exists");

        return $class;
    }

    private function getMethod($class)
    {
        $oController = new $class;
        $method = $this->route->getMethod();

        if (!method_exists($oController, $method))
            throw new \Exception("Method " . $method . " does not exists in class" . $class);

        return $method;
    }

}