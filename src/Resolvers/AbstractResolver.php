<?php

namespace Rnr\Resolvers\Resolvers;

use Rnr\Resolvers\Traits\ContainerAwareTrait;


/**
 * @author Sergei Melnikov <me@rnr.name>
 */
abstract class AbstractResolver
{
    use ContainerAwareTrait;

    /**
     * @param $object
     */
    abstract function bind($object);
}