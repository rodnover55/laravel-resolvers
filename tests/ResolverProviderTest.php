<?php

namespace Rnr\Tests\Resolvers;

use Rnr\Resolvers\Providers\ResolversProvider;


/**
 * @author Sergei Melnikov <me@rnr.name>
 */
class ResolverProviderTest extends TestCase
{
    public function testPublishing() {
        /**
         * @var ResolversProvider $provider
         */
        $provider = $this->app->getProvider(ResolversProvider::class);

        $this->assertPublishData($provider);
    }

    /**
     * @param ResolversProvider $provider
     */
    public function assertPublishData(ResolversProvider $provider)
    {
        $data = $provider->getPublishingData();

        $this->assertArrayHasKey('config', $data);

        foreach (array_keys($data['config']) as $path) {
            $this->assertFileExists($path);
        }
    }
}