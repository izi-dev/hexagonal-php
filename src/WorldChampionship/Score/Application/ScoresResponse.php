<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Score\Application;

use IziDev\Shared\Domain\Bus\Query\Response;
use IziDev\WorldChampionship\Score\Application\ScoreResponse;
use IziDev\WorldChampionship\Score\Domain\Scores;

final class ScoresResponse implements Response
{
    public function __construct(private array $scores)
    {
    }

    public static function fromScores(Scores $scores): self
    {
        $responses = array_map(
            fn($score) => ScoreResponse::fromScore($score),
            $scores->all()
        );

        return new self($responses);
    }

    public function toArray(): array
    {
        return array_map(fn(ScoreResponse $response) => $response->toArray(), $this->scores);
    }
}