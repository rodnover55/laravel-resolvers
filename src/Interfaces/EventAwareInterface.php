<?php
namespace Rnr\Resolvers\Interfaces;

use Illuminate\Contracts\Events\Dispatcher;

interface EventAwareInterface
{
    public function setDispatcher(Dispatcher $dispatcher);
}