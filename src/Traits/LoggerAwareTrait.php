<?php
namespace Mildberry\Resolvers\Traits;

use Illuminate\Contracts\Logging\Log;

trait LoggerAwareTrait
{
    /** @var Log */
    protected $logger;

    public function setLogger(Log $logger) {
        $this->logger = $logger;
    }
}