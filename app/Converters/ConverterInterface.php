<?php

namespace Test\Converters;

interface ConverterInterface
{
    public function convert($data): string;
}