<?php

namespace Mildberry\Resolvers\Interfaces;

use Mildberry\Kangaroo\Libraries\Resource\Resource\Manager;

/**
 * @author Egor Zyuskin <e.zyuskin@mildberry.com>
 */
interface ResourceAwareInterface
{
    public function setResource(Manager $manager);
}
