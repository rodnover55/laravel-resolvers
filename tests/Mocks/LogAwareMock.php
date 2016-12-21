<?php
namespace Mildberry\Tests\Resolvers\Mocks;

use Mildberry\Resolvers\Interfaces\LoggerAwareInterface;
use Mildberry\Resolvers\Traits\LoggerAwareTrait;

class LogAwareMock extends SimpleMock implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    public function getLogger() {
        return $this->logger;
    }
}