<?php
namespace Mildberry\Tests\Resolvers\Mocks;

use Mildberry\Resolvers\Interfaces\ContainerAwareInterface;
use Mildberry\Resolvers\Traits\ContainerAwareTrait;

class ContainerAwareMock extends SimpleMock implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function getContainer() {
        return $this->container;
    }
}