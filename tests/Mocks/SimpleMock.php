<?php
namespace Mildberry\Tests\Resolvers\Mocks;

use PHPUnit_Framework_AssertionFailedError;

class SimpleMock
{
    public function __call($name, $args) {
        throw new PHPUnit_Framework_AssertionFailedError("Method '{$name}' shouldn't be called.");
    }
}