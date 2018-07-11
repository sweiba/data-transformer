<?php

namespace Test\Providers;

use League\Csv\Reader;
use Test\DataProvider;

class CSVDataProvider implements ProviderInterface
{

    const FILE_PATH = "src/books.csv";
    private $parser;

    public function __construct(Reader $parser)
    {
        $this->parser = $parser;
        $this->parser->setDelimiter(";");

    }

    public function getData()
    {
        return $this->parser->jsonSerialize();
    }
}