<?php

namespace Rnr\Resolvers\Interfaces;
use Illuminate\Database\ConnectionInterface;

/**
 * @author Sergei Melnikov<me@rnr.name>
 */
interface DatabaseAwareInterface
{
    public function setConnection(ConnectionInterface $connection);
}