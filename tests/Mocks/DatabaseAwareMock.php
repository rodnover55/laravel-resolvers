<?php

namespace Mildberry\Tests\Resolvers\Mocks;
use Mildberry\Resolvers\Interfaces\DatabaseAwareInterface;
use Mildberry\Resolvers\Traits\DatabaseAwareTrait;

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