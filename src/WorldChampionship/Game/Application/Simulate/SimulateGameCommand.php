<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Game\Application\Simulate;

use IziDev\Shared\Domain\Bus\Command\Command;

final class SimulateGameCommand implements Command
{
    public function __construct()
    {
    }

    public function commandName(): string
    {
        return "world.championship.game.simulate";
    }
}