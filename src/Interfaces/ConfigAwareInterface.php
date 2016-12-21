<?php
namespace Mildberry\Resolvers\Interfaces;

use Illuminate\Config\Repository as Config;

interface ConfigAwareInterface
{
    public function setConfig(Config $config);
}