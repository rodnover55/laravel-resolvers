<?php
namespace Rnr\Resolvers\Interfaces;

use Illuminate\Config\Repository as Config;

interface ConfigAwareInterface
{
    /**
     * @param Config $config
     */
    public function setConfig(Config $config);
}