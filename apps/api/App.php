<?php declare(strict_types=1);

namespace IziDev\Api;

use IziDev\Api\Services\Router;
use Illuminate\Contracts\Container\Container;

final class App
{
    public function __construct(private Container $container)
    {
    }

    public function run()
    {
        $this->routes();
    }


    private function routes()
    {
        $config = include __DIR__ . '/Config/route.php';
        $route = new Router($this->container, $config);
        $route->__invoke();
    }
}