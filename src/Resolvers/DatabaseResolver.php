<?php

namespace Mildberry\Resolvers\Resolvers;

use Mildberry\Resolvers\Interfaces\DatabaseAwareInterface;


/**
 * @author Sergei Melnikov <me@rnr.name>
 */
class DatabaseResolver extends AbstractResolver
{
    /**
     * @param DatabaseAwareInterface $object
     */
    function bind($object)
    {
        $object->setConnection($this->container->make('db.connection'));
    }
}