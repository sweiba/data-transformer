<?php

namespace Test;

class Route
{

    private $class;

    public function getClass()
    {
        return $this->class;
    }

    public function getMethod()
    {
        return $this->method;
    }

    private $method;

    public function __construct(string $route, $delimiter = "@")
    {
        if (!$route || !substr_count($route, $delimiter))
            throw new \InvalidArgumentException("Invalid route string: " . $route);

        $ex = explode($delimiter, $route);
        $this->class = $ex[0];
        $this->method = $ex[1];
    }

}