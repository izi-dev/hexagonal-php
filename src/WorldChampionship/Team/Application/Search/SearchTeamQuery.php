<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Team\Application\Search;

use IziDev\Shared\Domain\Bus\Query\Query;

final class SearchTeamQuery implements Query
{
    public function __construct()
    {
    }

    public function queryName(): string
    {
        return "world.championship.team.search";
    }
}