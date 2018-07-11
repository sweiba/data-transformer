<?php

namespace Test\OutputHandlers;

class  ScreenOutput implements OutputInterface
{

    public function output(string $data)
    {
        echo $data;
    }

    public function setHeaders(array $headers)
    {
        foreach ($headers as $header) {
            header($header);
        }
        return $this;
    }
}