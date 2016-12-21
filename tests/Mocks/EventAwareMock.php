<?php
namespace Rnr\Tests\Resolvers\Mocks;

use Rnr\Resolvers\Interfaces\EventAwareInterface;
use Rnr\Resolvers\Traits\EventAwareTrait;

class EventAwareMock extends SimpleMock implements EventAwareInterface
{
    use EventAwareTrait;

    public function getDispatcher() {
        return $this->dispatcher;
    }
}