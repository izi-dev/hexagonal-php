<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Infraction\Application\Search;

use IziDev\Shared\Domain\Bus\Query\QueryHandler;
use IziDev\WorldChampionship\Infraction\Application\InfractionsResponse;
use IziDev\WorldChampionship\Infraction\Domain\InfractionRepository;

final class SearchInfractionQueryHandler implements QueryHandler
{
    public function __construct(private InfractionRepository $repository)
    {
    }

    public function __invoke(SearchInfractionQuery $query): InfractionsResponse
    {
        $infractions = $this->repository->search();
        return InfractionsResponse::fromInfractions($infractions);
    }
}