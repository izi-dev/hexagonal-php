<?php

namespace IziDev\WorldChampionship\Report\Domain;

use IziDev\Shared\Domain\Collection;

class Teams extends Collection
{
    public function add(Team $team)
    {
        $this->items[] = $team;
    }
}