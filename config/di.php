<?php

use Test\Config;
use Test\Converters\ConverterInterface;
use Test\OutputHandlers\OutputInterface;
use Test\Providers\ProviderInterface;


return [
    ProviderInterface::class => \DI\factory(function ()  {
        return (new Config())->getInputHandler();
    }),
    OutputInterface::class => \DI\factory(function () {
        return (new Config())->getOutputHandler();
    }),
    ConverterInterface::class => \DI\factory(function () {
        return (new Config())->getOutputFormatHandler();
    }),
    \Test\DataTransformer::class => \DI\create()
        ->constructor(
            \DI\get(ProviderInterface::class),
            \DI\get(ConverterInterface::class),
            \DI\get(OutputInterface::class)
        ),
];
