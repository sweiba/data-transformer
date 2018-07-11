<?php

namespace Test\Converters;

use Test\OutputHandlers\WithAdditionalHeaders;

class JsonConverter implements ConverterInterface, WithAdditionalHeaders
{

    const DEFAULT_ROOT_ITEM = "data";
    private $rootItem;

    public function __construct(string $rootItem)
    {
        $this->rootItem = $rootItem;
        if (!$this->rootItem)
            $this->rootItem = static::DEFAULT_ROOT_ITEM;
    }

    public function convert($data): string
    {
        return json_encode([$this->rootItem => $data], JSON_UNESCAPED_UNICODE);
    }

    public function getAdditionalHeaders(): array
    {
        return [
            "Content-Type: application/json; charset=utf-8"
        ];
    }
}