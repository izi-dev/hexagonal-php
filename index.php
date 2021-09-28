<?php

use IziDev\Api\App;
use IziDev\Shared\Infrastructure\Eloquent\DatabaseProvider;
use IziDev\Shared\Infrastructure\Illuminate\Container;
use IziDev\WorldChampionship\Shared\Infrastructure\Illuminate\Database\Migrations\Script;

require __DIR__.'/vendor/autoload.php';

$containers = include __DIR__ . '/Config/containers.php';
$container = new Illuminate\Container\Container;
$container = (new Container($container))->make($containers);

$config = include __DIR__ . '/Config/database.php';
$database = new DatabaseProvider($config);
$database->__invoke();

$script = new Script();
$script->execute();

(new App($container))->run();