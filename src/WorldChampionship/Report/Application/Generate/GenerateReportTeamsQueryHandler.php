<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Report\Application\Generate;

use IziDev\Shared\Domain\Bus\Query\QueryHandler;
use IziDev\WorldChampionship\Report\Application\ReportTeamsResponse;
use IziDev\WorldChampionship\Report\Domain\ReportRepository;

final class GenerateReportTeamsQueryHandler implements QueryHandler
{
    public function __construct(private ReportRepository $repository)
    {
    }

    public function __invoke(GenerateReportTeamsQuery $query): ReportTeamsResponse
    {
        $teams = $this->repository->generateTeams();
        return ReportTeamsResponse::fromTeams($teams);
    }
}