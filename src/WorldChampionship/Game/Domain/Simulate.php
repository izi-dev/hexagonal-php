<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Game\Domain;

use IziDev\Shared\Domain\Aggregate\AggregateRoot;
use IziDev\WorldChampionship\Team\Domain\Teams;
use IziDev\WorldChampionship\Infraction\Domain\Infractions;

final class Simulate extends AggregateRoot
{
    public function __construct(
        private Games $games,
        private Teams $teams,
        private Infractions $infractions
    )
    {
    }

    public function games(): Games
    {
        return $this->games;
    }

    public function teams(): Teams
    {
        return $this->teams;
    }

    public function infractions(): Infractions
    {
        return $this->infractions;
    }
}