<?php
namespace Rnr\Resolvers\Interfaces;

use Illuminate\Contracts\Container\Container;

interface ContainerAwareInterface
{
    public function setContainer(Container $container);
}