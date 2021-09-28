<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Game\Domain;

use IziDev\WorldChampionship\Player\Domain\Players;
use IziDev\WorldChampionship\Team\Domain\Teams;

interface SimulateRepository
{
    public function generator(Teams $teams, Players $players): Simulate;
}