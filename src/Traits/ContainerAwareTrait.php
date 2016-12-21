<?php
namespace Rnr\Resolvers\Traits;

use Illuminate\Contracts\Container\Container;

trait ContainerAwareTrait
{
    /** @var Container */
    protected $container;

    /**
     * @param Container $container
     * @return $this
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;

        return $this;
    }
}