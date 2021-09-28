<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Score\Application\Create;

use IziDev\Shared\Domain\Bus\Command\Command;

final class CreateScoreCommand implements Command
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

    public function id(): string
    {
        return $this->id;
    }

    public function gameId(): string
    {
        return $this->gameId;
    }

    public function playerId(): string
    {
        return $this->playerId;
    }

    public function teamId(): string
    {
        return $this->teamId;
    }

    public function goal(): int
    {
        return $this->goal;
    }

    public function commandName(): string
    {
        return "world.championship.score.create";
    }
}