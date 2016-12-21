<?php
namespace Rnr\Tests\Resolvers\Mocks;


use Rnr\Resolvers\Interfaces\ConfigAwareInterface;
use Rnr\Resolvers\Traits\ConfigAwareTrait;
use Illuminate\Config\Repository as Config;

class ConfigAwareMock extends SimpleMock implements ConfigAwareInterface
{
    use ConfigAwareTrait;

    /**
     * @return Config
     */
    public function getConfig() {
        return $this->config;
    }
}