<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Infraction\Application;

use IziDev\Shared\Domain\Bus\Query\Response;
use IziDev\WorldChampionship\Infraction\Domain\Infraction;

final class InfractionResponse implements Response
{
    public function __construct(
        private string $id,
        private string $playerId,
        private string $gameId,
        private string $teamId,
        private int $yellowCard,
        private int $redCard,
    )
    {
    }

    public static function fromInfraction(Infraction $infraction): self
    {
        return new self(
            $infraction->id()->value(),
            $infraction->playerId()->value(),
            $infraction->gameId()->value(),
            $infraction->teamId()->value(),
            $infraction->yellowCard()->value(),
            $infraction->redCard()->value(),
        );
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

    public function teamId(): string
    {
        return $this->teamId;
    }

    public function yellowCard(): int
    {
        return $this->yellowCard;
    }

    public function redCard(): int
    {
        return $this->redCard;
    }
}