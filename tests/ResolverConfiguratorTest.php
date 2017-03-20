<?php

namespace Rnr\Tests\Resolvers;

use Rnr\Resolvers\Interfaces\ContainerAwareInterface;
use Rnr\Resolvers\Manage\ResolverConfigurator;
use Rnr\Resolvers\Resolvers\ContainerResolver;
use Rnr\Tests\Resolvers\Mocks\ContainerAwareMock;

class ResolverConfiguratorTest extends TestCase
{
    public function testWithoutResolver() {
        $configurator = new ResolverConfigurator();

        $configurator
            ->setContainer($this->app);

        $this->app->instance(ResolverConfigurator::class, $configurator);

        /** @var ContainerAwareMock $object */
        $object = $this->app->make(ContainerAwareMock::class);

        $this->assertFalse($object->resolved);
    }
    public function testAddResolver() {
        $configurator = new ResolverConfigurator();

        $configurator
            ->setContainer($this->app);

        $this->app->instance(ResolverConfigurator::class, $configurator);

        $configurator->setResolver(ContainerAwareInterface::class, ContainerResolver::class);

        /** @var ContainerAwareMock $object */
        $object = $this->app->make(ContainerAwareMock::class);

        $this->assertTrue($object->resolved);
    }

    public function testRemoveResolver() {
        /** @var ResolverConfigurator $configurator */
        $configurator = $this->app->make(ResolverConfigurator::class);

        $configurator
            ->removeResolver(ContainerAwareInterface::class);

        /** @var ContainerAwareMock $object */
        $object = $this->app->make(ContainerAwareMock::class);

        $this->assertFalse($object->resolved);
    }
}