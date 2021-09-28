<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Report\Application\Generate;

use IziDev\Shared\Domain\Bus\Query\Query;

final class GenerateReportTeamsQuery implements Query
{
    public function __construct()
    {
    }

    public function queryName(): string
    {
        return "world.championship.report.generate.teams";
    }
}