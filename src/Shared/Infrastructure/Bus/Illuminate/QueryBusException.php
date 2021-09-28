<?php declare(strict_types=1);

namespace IziDev\Shared\Infrastructure\Bus\Illuminate;

use IziDev\Shared\Infrastructure\InfrastructureException;
use Throwable;

class QueryBusException extends InfrastructureException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $message = "" === $message ? "Query bus exception" : $message;

        parent::__construct($message, $code, $previous);
    }
}
