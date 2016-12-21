<?php
namespace Rnr\Tests\Resolvers\Mocks;

use Rnr\Resolvers\Interfaces\LoggerAwareInterface;
use Rnr\Resolvers\Traits\LoggerAwareTrait;

class LogAwareMock extends SimpleMock implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    public function getLogger() {
        return $this->logger;
    }
}