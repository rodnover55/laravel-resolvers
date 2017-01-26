<?php

namespace Rnr\Resolvers\Providers;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Config\Repository as Config;
use Rnr\Resolvers\Resolvers\AbstractResolver;
use ReflectionMethod;
use ReflectionException;

class ResolversProvider extends ServiceProvider
{
    /**
     * @var Application
     */
    protected $app;

    public function register() {
        $this->publishData();
        $this->bindResolvers();
    }

    protected function bindResolvers() {
        /** @var Config $config $config */
        $config = $this->app->make(Config::class);

        $resolvers = array_map(function ($class) {
            /** @var AbstractResolver $resolver */
            $resolver = $this->app->make($class);
            $resolver->setContainer($this->app);

            return $resolver;
        }, $config->get('container.resolvers', []));

        $this->app->afterResolving(function ($object) use ($resolvers) {
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
