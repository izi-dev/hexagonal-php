<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Player\Application\Search;

use IziDev\Shared\Domain\Bus\Query\QueryHandler;
use IziDev\WorldChampionship\Player\Domain\PlayerRepository;
use IziDev\WorldChampionship\Player\Application\PlayersResponse;

final class SearchPlayerQueryHandler implements QueryHandler
{
    public function __construct(private PlayerRepository $repository)
    {
    }

    public function __invoke(SearchPlayerQuery $query): PlayersResponse
    {
        $players = $this->repository->search();
        return PlayersResponse::fromPlayers($players);
    }
}