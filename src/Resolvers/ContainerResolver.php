<?php

namespace Rnr\Resolvers\Resolvers;

use Rnr\Resolvers\Interfaces\ContainerAwareInterface;


/**
 * @author Sergei Melnikov <me@rnr.name>
 */
class ContainerResolver extends AbstractResolver
{
    /**
     * @param ContainerAwareInterface $object
     */
    public function bind($object) {
        $object->setContainer($this->container);
    }
}