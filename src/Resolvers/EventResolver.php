<?php

namespace Rnr\Resolvers\Resolvers;

use Rnr\Resolvers\Interfaces\EventAwareInterface;
use Illuminate\Contracts\Events\Dispatcher;


/**
 * @author Sergei Melnikov <me@rnr.name>
 */
class EventResolver extends AbstractResolver
{
    /**
     * @param EventAwareInterface $object
     */
    function bind($object)
    {
        $object->setDispatcher($this->container->make(Dispatcher::class));
    }

}