<?php

namespace Mildberry\Resolvers\Traits;

use Mildberry\Kangaroo\Libraries\Resource\Resource\Manager;

/**
 * @author Egor Zyuskin <e.zyuskin@mildberry.com>
 */
trait ResourceAwareTrait
{
    /** @var Manager */
    protected $resource;

    public function setResource(Manager $manager) {
        $this->resource = $manager;
    }
}
