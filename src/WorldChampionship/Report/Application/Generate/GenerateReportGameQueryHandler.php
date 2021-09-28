<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Report\Application\Generate;

use IziDev\Shared\Domain\Bus\Query\QueryHandler;
use IziDev\WorldChampionship\Report\Domain\ReportRepository;
use IziDev\WorldChampionship\Report\Application\ReportGamesResponse;

final class GenerateReportGameQueryHandler implements QueryHandler
{
    public function __construct(private ReportRepository $repository)
    {
    }

    public function __invoke(GenerateReportGameQuery $query): ReportGamesResponse
    {
        $games = $this->repository->generateGames();
        return ReportGamesResponse::fromGames($games);
    }
}