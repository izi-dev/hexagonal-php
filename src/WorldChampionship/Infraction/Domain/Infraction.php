<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Infraction\Domain;

use IziDev\Shared\Domain\Aggregate\AggregateRoot;
use IziDev\WorldChampionship\Game\Domain\GameId;
use IziDev\WorldChampionship\Player\Domain\PlayerId;
use IziDev\WorldChampionship\Team\Domain\TeamId;

final class Infraction extends AggregateRoot
{
    public function __construct(private InfractionId         $id,
                                private PlayerId             $playerId,
                                private TeamId               $teamId,
                                private GameId               $gameId,
                                private InfractionYellowCard $yellowCard,
                                private InfractionRedCard    $redCard,
    )
    {
    }

    public static function fromPrimitives(array $primitives): self
    {
        return new self(
            InfractionId::fromValue($primitives["id"]),
            PlayerId::fromValue($primitives["playerId"]),
            TeamId::fromValue($primitives["teamId"]),
            GameId::fromValue($primitives["gameId"]),
            InfractionYellowCard::fromValue($primitives["yellowCard"]),
            InfractionRedCard::fromValue($primitives["redCard"])
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id()->value(),
            'playerId' => $this->playerId()->value(),
            'teamId' => $this->teamId()->value(),
            'gameId' => $this->gameId()->value(),
            'yellowCard' => $this->yellowCard()->value(),
            'redCard' => $this->redCard()->value(),
        ];
    }

    public function id(): InfractionId
    {
        return $this->id;
    }

    public function playerId(): PlayerId
    {
        return $this->playerId;
    }

    public function gameId(): GameId
    {
        return $this->gameId;
    }

    public function teamId(): TeamId
    {
        return $this->teamId;
    }

    public function yellowCard(): InfractionYellowCard
    {
        return $this->yellowCard;
    }

    public function redCard(): InfractionRedCard
    {
        return $this->redCard;
    }
}