<?php

namespace Rnr\Resolvers\Providers;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Config\Repository as Config;
use Rnr\Resolvers\Resolvers\AbstractResolver;

class ResolversProvider extends ServiceProvider
{
    /**
     * @var Application
     */
    protected $app;

    public function register() {
        $this->bindResolvers();
    }

    protected function bindResolvers() {
        /** @var Config $config $config */
        $config = $this->app->make(Config::class);

        $resolvers = $config->get('container.resolvers', []);

        foreach ($resolvers as $abstract => $class) {
            /** @var AbstractResolver $resolver */
            $resolver = $this->app->make($class);
            $resolver->setContainer($this->app);

            $this->app->afterResolving($abstract, function ($object) use ($resolver) {
                $resolver->bind($object);
            });
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
