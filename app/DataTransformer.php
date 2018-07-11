<?php

namespace Test;

use Test\Converters\ConverterInterface;
use Test\OutputHandlers\OutputInterface;
use Test\OutputHandlers\WithAdditionalHeaders;
use Test\Providers\CSVDataProvider;

class DataTransformer
{
    private $provider;
    private $outputHandler;
    private $converter;
    private $data;

    public function __construct(CSVDataProvider $provider, ConverterInterface $converter, OutputInterface $outputHandler)
    {
        $this->provider = $provider;
        $this->converter = $converter;
        $this->outputHandler = $outputHandler;

        $this->setAdditionalHeaders();
    }

    public function getData()
    {
        return $this->data;
    }

    public function receive()
    {
        $this->data = $this->provider->getData();
        return $this;
    }

    public function convert()
    {
        $this->data = $this->converter->convert($this->getData());
        return $this;
    }

    public function output()
    {
        $this->outputHandler->output($this->getData());
    }

    public function setAdditionalHeaders()
    {
        if(!$this->converter instanceof WithAdditionalHeaders)
            return false;

        foreach ($this->converter->getAdditionalHeaders() as $header) {
            header($header, true);
        };
        return true;
    }
}