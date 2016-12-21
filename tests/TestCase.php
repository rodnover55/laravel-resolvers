<?php
namespace Rnr\Tests\Resolvers;

use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Rnr\Resolvers\Providers\ResolversProvider;
use Illuminate\Contracts\Config\Repository as Config;

class TestCase extends BaseTestCase
{
    /**
     * @param Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [ResolversProvider::class];
    }

    /**
     * @param Application $app
     */
    protected function resolveApplicationConfiguration($app)
    {
        parent::resolveApplicationConfiguration($app);
        /**
         * @var Config $config
         */
        $config = $app->make(Config::class);

        $container = require dirname(__DIR__) . '/config/container.php';
        $config->set('container', $container);
    }
}