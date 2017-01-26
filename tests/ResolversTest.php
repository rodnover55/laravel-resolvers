<?php
namespace Rnr\Tests\Resolvers;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Logging\Log;
use Rnr\Tests\Resolvers\Mocks\ConfigAwareMock;
use Rnr\Tests\Resolvers\Mocks\ContainerAwareMock;
use Rnr\Tests\Resolvers\Mocks\DatabaseAwareMock;
use Rnr\Tests\Resolvers\Mocks\EventAwareMock;
use Rnr\Tests\Resolvers\Mocks\ResolvingMock;
use Rnr\Tests\Resolvers\Mocks\SimpleMock;
use Illuminate\Contracts\Config\Repository as Config;
use Rnr\Tests\Resolvers\Mocks\LogAwareMock;

class ResolversTest extends TestCase
{
    public function testSimple() {
        $this->app->make(SimpleMock::class);
    }

    public function testContainer() {
        /** @var ContainerAwareMock $object */
        $object = $this->app->make(ContainerAwareMock::class);

        $container = $object->getContainer();

        $this->assertNotEmpty($container);
        $this->assertEquals($this->app, $container);

        $this->assertTrue($object->resolved);
    }

    public function testConfig() {
        /** @var ConfigAwareMock $object */
        $object = $this->app->make(ConfigAwareMock::class);

        $config = $object->getConfig();

        $this->assertNotEmpty($config);
        $this->assertEquals($this->app->make(Config::class), $config);
    }

    public function testEvent() {
        /** @var EventAwareMock $object */
        $object = $this->app->make(EventAwareMock::class);

        $dispatcher = $object->getDispatcher();

        $this->assertNotEmpty($dispatcher);
        $this->assertEquals($this->app->make(Dispatcher::class), $dispatcher);
    }

    public function testLogger() {
        /** @var LogAwareMock $object */
        $object = $this->app->make(LogAwareMock::class);

        $dispatcher = $object->getLogger();

        $this->assertNotEmpty($dispatcher);
        $this->assertEquals($this->app->make(Log::class), $dispatcher);
    }


    public function testDatabase() {
        /** @var DatabaseAwareMock $object */
        $object = $this->app->make(DatabaseAwareMock::class);

        $builder = $object->getBuilder();

        $this->assertNotEmpty($builder);
        $this->assertEquals($builder, $this->app->make('db.connection'));
    }

    public function testAfterResolving() {
        /**
         * @var ResolvingMock $object
         */
        $object = $this->app->make(ResolvingMock::class);

        $this->assertFalse($object->resolved);
    }
}