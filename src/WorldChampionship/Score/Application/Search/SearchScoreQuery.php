<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Score\Application\Search;

use IziDev\Shared\Domain\Bus\Query\Query;

final class SearchScoreQuery implements Query
{
    public function __construct()
    {
    }

    public function queryName(): string
    {
        return "world.championship.score.search";
    }
}