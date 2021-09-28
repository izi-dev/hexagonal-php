<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Infraction\Application\Search;

use IziDev\Shared\Domain\Bus\Query\Query;

final class SearchInfractionQuery implements Query
{
    public function __construct()
    {
    }

    public function queryName(): string
    {
        return "world.championship.infraction.search";
    }
}