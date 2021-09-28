<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Game\Application\Search;

use IziDev\Shared\Domain\Bus\Query\QueryHandler;
use IziDev\WorldChampionship\Game\Domain\GameRepository;
use IziDev\WorldChampionship\Game\Application\GamesResponse;

final class SearchGameQueryHandler implements QueryHandler
{
    public function __construct(private GameRepository $repository)
    {
    }

    public function __invoke(SearchGameQuery $query): GamesResponse
    {
        $games = $this->repository->search();
        return GamesResponse::fromPlayers($games);
    }
}