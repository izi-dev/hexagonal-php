<?php

use IziDev\Shared\Domain\Bus\Command\CommandBus;
use IziDev\Shared\Domain\Bus\Query\QueryBus;
use IziDev\Shared\Infrastructure\Bus\Illuminate\CommandBus as IlluminateCommandBus;
use IziDev\Shared\Infrastructure\Bus\Illuminate\QueryBus as IlluminateQueryBus;
use IziDev\WorldChampionship\Game\Domain\GameRepository;
use IziDev\WorldChampionship\Game\Domain\SimulateRepository;
use IziDev\WorldChampionship\Game\Infrastructure\Persistence\Eloquent\GameRepository as EloquentGameRepository;
use IziDev\WorldChampionship\Game\Infrastructure\TournamentR2G\Simulate;
use IziDev\WorldChampionship\Infraction\Domain\InfractionRepository;
use IziDev\WorldChampionship\Player\Domain\PlayerRepository;
use IziDev\WorldChampionship\Player\Infrastructure\Persistence\Eloquent\PlayerRepository as EloquentPlayerRepository;
use IziDev\WorldChampionship\Report\Domain\ReportRepository;
use IziDev\WorldChampionship\Report\Infrastructure\Persistence\Eloquent\ReportRepository as EloquentReportRepository;
use IziDev\WorldChampionship\Team\Domain\TeamRepository;
use IziDev\WorldChampionship\Team\Infrastructure\Persistence\Eloquent\TeamRepository as EloquentTeamRepository;
use IziDev\WorldChampionship\Infraction\Infrastructure\Persistence\Eloquent\InfractionRepository as EloquentInfractionRepository;

return [
    CommandBus::class => IlluminateCommandBus::class,
    QueryBus::class => IlluminateQueryBus::class,
    PlayerRepository::class => EloquentPlayerRepository::class,
    TeamRepository::class => EloquentTeamRepository::class,
    GameRepository::class => EloquentGameRepository::class,
    SimulateRepository::class => Simulate::class,
    InfractionRepository::class => EloquentInfractionRepository::class,
    ReportRepository::class => EloquentReportRepository::class
];