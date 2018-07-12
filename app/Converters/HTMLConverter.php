<?php

namespace Test\Converters;

class HTMLConverter implements ConverterInterface
{
    const VIEWS_DIR = "/resources/views/";

    private $viewName;

    public function __construct(string $viewName)
    {
        $this->viewName = $viewName;
        if (!file_exists($this->getViewPath()))
            throw new \Exception("View " . $viewName . " does not exists");
    }

    public function convert($data): string
    {
        return $this->view($data);
    }

    private function view($data)
    {
        ob_start();
        require_once $this->getViewPath();
        return ob_get_clean();
    }

    private function getViewPath()
    {
        $viewsDir = static::VIEWS_DIR;
        return $_SERVER["DOCUMENT_ROOT"] . $viewsDir . mb_strtolower($this->viewName) . ".php";
    }

}