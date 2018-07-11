<?php

namespace Test;

use League\Csv\Reader;
use Test\Converters\HTMLConverter;
use Test\Converters\JsonConverter;
use Test\OutputHandlers\FileOutput;
use Test\OutputHandlers\ScreenOutput;
use Test\Providers\CSVDataProvider;

class Config
{
    private $config;

    public function __construct()
    {
        $this->config = require $_SERVER["DOCUMENT_ROOT"]."/config/app.php";
    }

    public function getInputHandler()
    {
        switch ($this->config["input"]){
            default://csv
                $incomeFile = "src/books.csv";
                $reader = Reader::createFromPath($incomeFile);
                $class = new CSVDataProvider($reader);
        }

        return $class;
    }
    public function getOutputHandler()
    {
        switch ($this->config["output"]){
            case "file":
                $outputFile = "dst/books.html";
                $class = new FileOutput($outputFile);
                break;
            default://csv
                $class = new ScreenOutput();
        }

        return $class;
    }
    public function getOutputFormatHandler()
    {
        switch ($this->config["output_format"]){
            case "json":
                $jsonRoot = "books";
                $class = new JsonConverter($jsonRoot);
                break;
            default://csv
                $htmlView = "books";
                $class = new HTMLConverter($htmlView);
        }

        return $class;
    }
}