<?php

namespace Test\Controllers;

use Test\Factories\DataFactory;

class BookController
{
    public function index()
    {
        $dataTransformer = DataFactory::getTransformer();
        $dataTransformer->receive()->convert()->output();

    }
}