<?php declare(strict_types=1);

namespace IziDev\Shared\Infrastructure\Eloquent;

use Illuminate\Database\Capsule\Manager as Capsule;

final class DatabaseProvider
{
    public function __construct(private array$config)
    {
    }

    public function __invoke()
    {
        $config = $this->config;
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver' => $config['DB_CONNECTION'],
            'host' => $config['DB_HOST'],
            'database' => $config['DB_DATABASE'],
            'username' => $config['DB_USERNAME'],
            'password' => $config['DB_PASSWORD'] ?: "",
            'port' => $config['DB_PORT'],
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);

        $capsule->setAsGlobal();

        $capsule->bootEloquent();
    }
}