<?php declare(strict_types=1);

namespace IziDev\Shared\Infrastructure\Illuminate;

use Illuminate\Http\Request;
use Illuminate\Contracts\Container\Container as ContainerContract;

final class Container
{
    public function __construct(private ContainerContract $container)
    {
    }

    public function make(array $containers): \Illuminate\Container\Container
    {
        $container = \Illuminate\Container\Container::setInstance($this->container);
        $container->instance('Illuminate\Http\Request', Request::capture());

        foreach ($containers as $interface => $class) {
            $container->bind($interface, $class);
        }

        return $container;
    }
}