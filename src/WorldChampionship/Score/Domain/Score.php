<?php

namespace IziDev\WorldChampionship\Score\Domain;

use IziDev\WorldChampionship\Game\Domain\GameId;
use IziDev\WorldChampionship\Team\Domain\TeamId;
use IziDev\Shared\Domain\Aggregate\AggregateRoot;
use IziDev\WorldChampionship\Player\Domain\PlayerId;

final class Score extends AggregateRoot
{
    public function __construct(
        private ScoreId $id,
        private GameId $gameId,
        private PlayerId $playerId,
        private TeamId $teamId,
        private ScoreGoal $goal
    )
    {
    }

    public static function fromPrimitives(array $primitives): self
    {
        return new self(
            ScoreId::fromValue($primitives["id"]),
            GameId::fromValue($primitives["gameId"]),
            PlayerId::fromValue($primitives["playerId"]),
            TeamId::fromValue($primitives["teamId"]),
            ScoreGoal::fromValue($primitives["goal"]),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id,
            'gameId' => $this->gameId,
            'playerId' => $this->playerId,
            'teamId' => $this->teamId,
            'goal' => $this->goal,
        ];
    }

    public function id(): ScoreId
    {
        return $this->id;
    }

    public function gameId(): GameId
    {
        return $this->gameId;
    }

    public function playerId(): PlayerId
    {
        return $this->playerId;
    }

    public function teamId(): TeamId
    {
        return $this->teamId;
    }

    public function goal(): ScoreGoal
    {
        return $this->goal;
    }
}