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
        $this->config = require $_SERVER["DOCUMENT_ROOT"] . "/config/app.php";
    }

    public function getInputHandler()
    {
        switch ($this->config["input"]) {
            case "csv":
                $inputFile = $_SERVER["DOCUMENT_ROOT"] . $this->config["input_file_path"];
                $reader = Reader::createFromPath($inputFile);
                $class = new CSVDataProvider($reader);
                break;
            default:
                throw new \Exception("Input format " . $this->config["input"] . " does not exist");
        }

        return $class;
    }

    public function getOutputHandler()
    {
        switch ($this->config["output"]) {
            case "file":
                $outputFile = $_SERVER["DOCUMENT_ROOT"] . $this->config["output_file_path"];
                $class = new FileOutput($outputFile);
                break;
            case "screen":
                $class = new ScreenOutput();
                break;
            default:
                throw new \Exception("Output type " . $this->config["output"] . " does not exist");
        }

        return $class;
    }

    public function getOutputFormatHandler()
    {
        switch ($this->config["output_format"]) {
            case "json":
                $jsonRoot = $this->config["json_root"];
                $class = new JsonConverter($jsonRoot);
                break;
            case "html":
                $htmlView = $this->config["html_view"];
                $class = new HTMLConverter($htmlView);
                break;
            default:
                throw new \Exception("Output format " . $this->config["output_format"] . " does not exist");
        }

        return $class;
    }
}