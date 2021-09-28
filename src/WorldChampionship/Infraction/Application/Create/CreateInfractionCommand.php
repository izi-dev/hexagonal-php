<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Infraction\Application\Create;

use IziDev\Shared\Domain\Bus\Command\Command;

final class CreateInfractionCommand implements Command
{
    public function __construct(private string $id,
                                private string $playerId,
                                private string $teamId,
                                private string $gameId,
                                private int    $yellowCard,
                                private int    $redCard)
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function playerId(): string
    {
        return $this->playerId;
    }

    public function gameId(): string
    {
        return $this->gameId;
    }

    public function yellowCard(): int
    {
        return $this->yellowCard;
    }

    public function teamId(): int
    {
        return $this->teamId;
    }

    public function redCard(): int
    {
        return $this->redCard;
    }

    public function commandName(): string
    {
        return "world.championship.infraction.create";
    }
}