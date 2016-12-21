<?php
namespace Mildberry\Resolvers\Interfaces;


use Illuminate\Contracts\Logging\Log;

interface LoggerAwareInterface
{
    public function setLogger(Log $logger);
}