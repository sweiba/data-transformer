<?php

namespace Test\OutputHandlers;

class  ScreenOutput implements OutputInterface
{
    public function output(string $data)
    {
        echo $data;
    }
}