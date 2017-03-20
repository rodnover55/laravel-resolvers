<?php

namespace Rnr\Resolvers\Providers;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Config\Repository as Config;
use Rnr\Resolvers\Manage\ResolverConfigurator;
use Rnr\Resolvers\Resolvers\AbstractResolver;
use ReflectionMethod;
use ReflectionException;
use Rnr\Resolvers\Interfaces;
use Rnr\Resolvers\Resolvers;

class ResolversProvider extends ServiceProvider
{
    /**
     * @var Application
     */
    protected $app;

    public function register() {
        $this->publishData();
        $this->bindConfigurator();
        $this->bindResolvers();
    }

    protected function bindResolvers() {
        $this->app->afterResolving(function ($object) {
            /** @var ResolverConfigurator $configurator */
            $configurator = $this->app->make(ResolverConfigurator::class);

            $resolvers = $configurator->getResolvers();

            /** @var AbstractResolver[] $resolversToBind */
            $resolversToBind = array_filter($resolvers, function ($abstract) use ($object) {
                return is_a($object, $abstract);
            }, ARRAY_FILTER_USE_KEY);

            foreach ($resolversToBind as $abstract => $resolver) {
                $resolver->bind($object);
            }

            if ((count($resolversToBind) > 0)) {
                $this->callResolving($object);
            }
        });
    }

    protected function bindConfigurator() {
        /** @var Config $config */
        $config = $this->app->make(Config::class);

        $configurator = new ResolverConfigurator();

        $configurator
            ->setContainer($this->app);



        foreach (
            array_merge(
                $this->getDefaultResolvers(), $config->get('container.resolvers', []))
            as $interface => $resolver
        ) {
            $configurator->setResolver($interface, $resolver);
        }

        $this->app->instance(ResolverConfigurator::class, $configurator);
    }

    protected function getDefaultResolvers(): array {
        return [
            Interfaces\ContainerAwareInterface::class => Resolvers\ContainerResolver::class,
            Interfaces\EventAwareInterface::class => Resolvers\EventResolver::class,
            Interfaces\ConfigAwareInterface::class => Resolvers\ConfigResolver::class,
            Interfaces\LoggerAwareInterface::class => Resolvers\LoggerResolver::class,
            Interfaces\DatabaseAwareInterface::class => Resolvers\DatabaseResolver::class
        ];
    }

    /**
     * @param mixed $object
     */
    public function callResolving($object) {
        try {
            $reflection = new ReflectionMethod($object, 'afterResolving');

            if ($reflection->isPublic()) {
                $reflection->invoke($object);
            }
        } catch (ReflectionException $e) {
        }
    }
    
    /**
     * @return array
     */
    public function getPublishingData()
    {
        return [
            'config' => [
                dirname(dirname(__DIR__)) . '/config/container.php' =>
                    $this->app->configPath() . '/container.php',
            ]
        ];
    }

    protected function publishData()
    {
        foreach ($this->getPublishingData() as $tag => $data) {
            $this->publishes($data, $tag);
        }
    }
}
