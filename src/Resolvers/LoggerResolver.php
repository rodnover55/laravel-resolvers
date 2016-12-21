<?php

namespace Rnr\Resolvers\Resolvers;

use Rnr\Resolvers\Interfaces\LoggerAwareInterface;
use Illuminate\Contracts\Logging\Log;


/**
 * @author Sergei Melnikov <me@rnr.name>
 */
class LoggerResolver extends AbstractResolver
{
    /**
     * @param LoggerAwareInterface $object
     */
    function bind($object)
    {
        $object->setLogger($this->container->make(Log::class));
    }
}