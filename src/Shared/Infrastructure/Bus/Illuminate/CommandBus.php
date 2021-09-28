<?php declare(strict_types=1);

namespace IziDev\Shared\Infrastructure\Bus\Illuminate;

use Illuminate\Container\Container;
use IziDev\Shared\Domain\Bus\Command\Command;
use IziDev\Shared\Domain\Bus\Command\CommandBus as CommandBusInterface;

class CommandBus implements CommandBusInterface
{
    public function dispatch(Command $command): void
    {
        $handler = $this->resolveHandler($command);
        $handler->__invoke($command);
    }

    private function resolveHandler(Command $command)
    {
        $commandClassName = get_class($command);
        $handlerClassName = $commandClassName . 'Handler';

        if (false === class_exists($handlerClassName)) {
            throw new \Exception('Handler ' . $handlerClassName . ' not found');
        }

        $container = Container::getInstance();

        return $container->make($handlerClassName);
    }
}
