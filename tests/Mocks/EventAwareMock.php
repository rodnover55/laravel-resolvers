<?php
namespace Mildberry\Tests\Resolvers\Mocks;

use Mildberry\Resolvers\Interfaces\EventAwareInterface;
use Mildberry\Resolvers\Traits\EventAwareTrait;

class EventAwareMock extends SimpleMock implements EventAwareInterface
{
    use EventAwareTrait;

    public function getDispatcher() {
        return $this->dispatcher;
    }
}