<?php
namespace Mildberry\Tests\Resolvers\Mocks;


use Mildberry\Resolvers\Interfaces\ConfigAwareInterface;
use Mildberry\Resolvers\Traits\ConfigAwareTrait;

class ConfigAwareMock extends SimpleMock implements ConfigAwareInterface
{
    use ConfigAwareTrait;

    public function getConfig() {
        return $this->config;
    }
}