<?php declare(strict_types=1);

namespace IziDev\Shared\Infrastructure\Bus\Illuminate;

use Illuminate\Container\Container;
use IziDev\Shared\Domain\Bus\Query\Query;
use IziDev\Shared\Domain\Bus\Query\QueryBus as QueryBusInterface;
use IziDev\Shared\Domain\Bus\Query\Response;

class QueryBus implements QueryBusInterface
{
    public function ask(Query $query): ?Response
    {
        $handler = $this->resolveHandler($query);

        return $handler->__invoke($query);
    }

    private function resolveHandler(Query $query)
    {
        $queryClassName = get_class($query);
        $handlerClassName = $queryClassName . 'Handler';

        if (false === class_exists($handlerClassName)) {
            throw new QueryBusException('Handler ' . $handlerClassName . ' not found');
        }

        $container = Container::getInstance();

        return $container->make($handlerClassName);
    }
}
