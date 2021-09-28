<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Score\Application\Search;

use IziDev\Shared\Domain\Bus\Query\QueryHandler;
use IziDev\WorldChampionship\Score\Domain\ScoreRepository;
use IziDev\WorldChampionship\Score\Application\ScoresResponse;

final class SearchScoreQueryHandler implements QueryHandler
{
    public function __construct(private ScoreRepository $repository)
    {
    }

    public function __invoke(SearchScoreQuery $query): ScoresResponse
    {
        $scores = $this->repository->search();
        return ScoresResponse::fromScores($scores);
    }
}