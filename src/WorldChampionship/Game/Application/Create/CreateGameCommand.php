<?php

declare(strict_types=1);

namespace IziDev\WorldChampionship\Game\Application\Create;

use IziDev\Shared\Domain\Bus\Command\Command;

final class CreateGameCommand implements Command
{
    public function __construct(private string $id,
                                private string $teamIdHome,
                                private string $teamIdAway,
                                private int    $day,
                                private int    $home,
                                private int    $away)
    {
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

    public function home(): int
    {
        return $this->home;
    }

    public function away(): int
    {
        return $this->away;
    }

    public function commandName(): string
    {
        return "world.championship.game.create";
    }
}