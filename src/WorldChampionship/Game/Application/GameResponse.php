<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Game\Application;

use IziDev\Shared\Domain\Bus\Query\Response;
use IziDev\WorldChampionship\Game\Domain\Game;

final class GameResponse implements Response
{
    public function __construct(
        private string $id,
        private string $teamIdHome,
        private string $teamIdAway,
        private int $day,
    )
    {
    }

    public static function fromGame(Game $game): self
    {
        return new self(
            $game->id()->value(),
            $game->teamIdHome()->value(),
            $game->teamIdAway()->value(),
            $game->day()->value(),
        );
    }

    public function id(): string
    {
        return $this->id;
    }

    public function teamIdHome(): string
    {
        return $this->teamIdHome;
    }

    public function teamIdAway(): string
    {
        return $this->teamIdAway;
    }

    public function day(): int
    {
        return $this->day;
    }
}