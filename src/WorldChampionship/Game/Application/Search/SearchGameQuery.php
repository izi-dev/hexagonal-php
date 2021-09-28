<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Game\Application\Search;

use IziDev\Shared\Domain\Bus\Query\Query;

final class SearchGameQuery implements Query
{
    public function __construct()
    {
    }

    public function queryName(): string
    {
        return "world.championship.game.search";
    }
}