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
    	$dir = dirname($this->path);
    	if(!file_exists($dir))
    		mkdir(dirname($this->path), 0777, true);
        file_put_contents($this->path, $data);
    }

}