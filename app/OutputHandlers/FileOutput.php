<?php

namespace Test\OutputHandlers;

class FileOutput implements OutputInterface
{

    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function output(string $data)
    {
        file_put_contents($this->getPath(), $data);
    }

    private function getPath()
    {
        return $this->path;
    }
}