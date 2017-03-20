<?php

namespace Rnr\Resolvers\Manage;

use Rnr\Resolvers\Resolvers\AbstractResolver;
use Rnr\Resolvers\Traits\ContainerAwareTrait;

class ResolverConfigurator
{
    use ContainerAwareTrait;

    /** @var array  */
    private $resolvers = [];

    public function setResolver(string $interface, string $class) {
        /** @var AbstractResolver $resolver */
        $resolver = $this->container->make($class);
        $resolver->setContainer($this->container);

        $this->resolvers[$interface] = $resolver;

        return $this;
    }

    /**
     * @return array
     */
    public function getResolvers(): array
    {
        return $this->resolvers;
    }

    public function removeResolver(string $interface) {
        unset($this->resolvers[$interface]);

        return $this;
    }
}