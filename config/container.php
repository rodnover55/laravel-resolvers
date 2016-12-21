<?php

use Mildberry\Resolvers\Interfaces;
use Mildberry\Resolvers\Resolvers;

return [
    'resolvers' => [
        Interfaces\ContainerAwareInterface::class => Resolvers\ContainerResolver::class,
        Interfaces\EventAwareInterface::class => Resolvers\EventResolver::class,
        Interfaces\ConfigAwareInterface::class => Resolvers\ConfigResolver::class,
        Interfaces\LoggerAwareInterface::class => Resolvers\LoggerResolver::class,
        Interfaces\DatabaseAwareInterface::class => Resolvers\DatabaseResolver::class
    ]
];