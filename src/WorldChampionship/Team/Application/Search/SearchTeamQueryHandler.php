<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Team\Application\Search;

use IziDev\Shared\Domain\Bus\Query\QueryHandler;
use IziDev\WorldChampionship\Team\Domain\TeamRepository;
use IziDev\WorldChampionship\Team\Application\TeamsResponse;

final class SearchTeamQueryHandler implements QueryHandler
{
    public function __construct(private TeamRepository $repository)
    {
    }

    public function __invoke(SearchTeamQuery $query): TeamsResponse
    {
        $teams = $this->repository->search();
        return TeamsResponse::fromTeams($teams);
    }
}