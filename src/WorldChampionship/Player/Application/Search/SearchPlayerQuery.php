<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Player\Application\Search;

use IziDev\Shared\Domain\Bus\Query\Query;

final class SearchPlayerQuery implements Query
{
    public function __construct()
    {
    }

    public function queryName(): string
    {
        return "world.championship.player.search";
    }
}