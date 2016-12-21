<?php

namespace Rnr\Resolvers\Traits;
use Illuminate\Database\ConnectionInterface;

/**
 * @author Sergei Melnikov<me@rnr.name>
 */
trait DatabaseAwareTrait
{
    /** @var ConnectionInterface */
    protected $db;

    public function setConnection(ConnectionInterface $connection) {
        $this->db = $connection;
    }
}