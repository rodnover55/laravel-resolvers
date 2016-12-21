<?php
namespace Mildberry\Resolvers\Traits;


use Illuminate\Contracts\Events\Dispatcher;

trait EventAwareTrait
{
    /** @var Dispatcher */
    private $dispatcher;

    public function setDispatcher(Dispatcher $dispatcher) {
        $this->dispatcher = $dispatcher;
    }

    public function fireEvent($event) {
        $this->dispatcher->fire($event);
    }
}