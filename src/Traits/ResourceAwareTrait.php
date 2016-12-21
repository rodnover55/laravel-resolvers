<?php

namespace Rnr\Resolvers\Traits;

use Rnr\Kangaroo\Libraries\Resource\Resource\Manager;

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
