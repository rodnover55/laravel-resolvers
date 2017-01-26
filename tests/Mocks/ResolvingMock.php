<?php

namespace Rnr\Tests\Resolvers\Mocks;


/**
 * @author Sergei Melnikov <me@rnr.name>
 */
class ResolvingMock
{
    public $resolved = false;

    public function afterResolving() {
        $this->resolved = true;
    }
}