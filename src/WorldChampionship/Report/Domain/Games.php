<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Report\Domain;

use IziDev\Shared\Domain\Collection;

final class Games extends Collection
{
    public function add(Game $reportGames)
    {
        $this->items[] = $reportGames;
    }
}