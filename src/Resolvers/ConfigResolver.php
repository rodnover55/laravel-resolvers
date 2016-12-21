<?php

namespace Mildberry\Resolvers\Resolvers;

use Mildberry\Resolvers\Interfaces\ConfigAwareInterface;
use Illuminate\Contracts\Config\Repository as Config;


/**
 * @author Sergei Melnikov <me@rnr.name>
 */
class ConfigResolver extends AbstractResolver
{
    /**
     * @param ConfigAwareInterface $object
     */
    function bind($object)
    {
        $object->setConfig($this->container->make(Config::class));
    }
}