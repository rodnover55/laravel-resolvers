<?php

namespace Rnr\Tests\Resolvers\Mocks;
use Rnr\Resolvers\Interfaces\DatabaseAwareInterface;
use Rnr\Resolvers\Traits\DatabaseAwareTrait;

/**
 * @author Sergei Melnikov<me@rnr.name>
 */
class DatabaseAwareMock extends SimpleMock implements DatabaseAwareInterface
{
    use DatabaseAwareTrait;

    public function getBuilder() {
        return $this->db;
    }
}