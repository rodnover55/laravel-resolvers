<?php

namespace Rnr\Resolvers\Interfaces;

use Rnr\Kangaroo\Libraries\Resource\Resource\Manager;

/**
 * @author Egor Zyuskin <e.zyuskin@mildberry.com>
 */
interface ResourceAwareInterface
{
    public function setResource(Manager $manager);
}
