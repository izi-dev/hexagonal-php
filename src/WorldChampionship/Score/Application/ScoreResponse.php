<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Score\Application;

use IziDev\Shared\Domain\Bus\Query\Response;
use IziDev\WorldChampionship\Score\Domain\Score;

final class ScoreResponse implements Response
{
    public function __construct(
        private string $id,
        private string $gameId,
        private string $playerId,
        private string $teamId,
        private int $goal
    )
    {
    }

    public static function fromScore(Score $score): self
    {
        return new self(
            $score->id()->value(),
            $score->gameId()->value(),
            $score->playerId()->value(),
            $score->teamId()->value(),
            $score->goal()->value(),
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'gameId' => $this->gameId,
            'playerId' => $this->playerId,
            'teamId' => $this->teamId,
            'goal' => $this->goal,
        ];
    }
}