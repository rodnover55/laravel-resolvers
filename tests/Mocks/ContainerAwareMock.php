<?php
namespace Rnr\Tests\Resolvers\Mocks;

use Rnr\Resolvers\Interfaces\ContainerAwareInterface;
use Rnr\Resolvers\Traits\ContainerAwareTrait;

class ContainerAwareMock extends SimpleMock implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public $resolved = false;

    public function getContainer() {
        return $this->container;
    }

    public function afterResolving() {
        $this->resolved = true;
    }
}