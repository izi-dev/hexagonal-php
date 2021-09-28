<?php declare(strict_types=1);

namespace IziDev\Api\Services;

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Str;

final class Router
{
    private $prefix_api;
    private $routes;
    private Container $container;

    public function __construct(Container $container, $config)
    {
        $this->prefix_api = $config['api']['prefix'];
        $this->routes = $config['api']['routes'];
        $this->container = $container;
    }

    public function __invoke()
    {
        $this->make();
        $this->redirect();
        $this->api();
        $this->dispatch();
    }

    private function api()
    {
        collect($this->routes)
            ->map(fn($controller, $path) => [
                'path' => $this->prefix_api . '/' . $path,
                'controller' => $controller,
                'name' => (string)Str::of($path)->lower()->replace('/', '.'),
                'method' => $this->getMethodRoute($controller)
            ])
            ->map(fn($route) => [$route['name'], $route['method'], $route['path'], $route['controller']])
            ->each(fn($route) => $this->add($route));
    }

    private function getMethodRoute($controller)
    {
        $methods = [
            "Get",
            "Post",
            "Delete",
            "Put"
        ];

        $method = collect($methods)
            ->filter(fn ($value) => strpos(class_basename($controller), $value) !== false)
            ->first();

        return method_exists(\Illuminate\Routing\Router::class, $method) ?
            strtoupper($method) :
            ['GET', 'HEAD', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'];
    }

    private function add($route)
    {
        [$name, $method, $path, $controller] = $route;
        $this->router->addRoute($method, $path, $controller)->name($name);
    }

    private function make()
    {
        $events = new Dispatcher($this->container);
        $this->router = new \Illuminate\Routing\Router($events, $this->container);
        return $this;
    }

    private function dispatch(): void
    {
        $response = $this->router->dispatch($this->request());
        $response->send();
    }

    private function redirect(): Redirector
    {
        return new Redirector(new UrlGenerator($this->router->getRoutes(), $this->request()));
    }

    private function request(): Request
    {
        return Request::capture();
    }
}