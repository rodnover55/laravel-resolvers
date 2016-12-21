<?php
namespace Rnr\Resolvers\Traits;

use Illuminate\Config\Repository as Config;

trait ConfigAwareTrait
{
    /** @var Config */
    protected $config;

    public function setConfig(Config $config) {
        $this->config = $config;
    }
}