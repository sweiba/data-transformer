<?php

namespace Test\Factories;

use DI\ContainerBuilder;
use Test\DataTransformer;

class DataFactory
{

    public static function getTransformer()
    {
        $builder = new ContainerBuilder();
        $builder->addDefinitions($_SERVER["DOCUMENT_ROOT"].'/config/di.php');
        $container = $builder->build();

        return $container->make(DataTransformer::class);
    }
}