<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Player\Domain;

use IziDev\Shared\Domain\Aggregate\AggregateRoot;
use IziDev\Shared\Domain\ValueObject\UuidValueObject;
use IziDev\WorldChampionship\Team\Domain\TeamId;

final class Player extends AggregateRoot
{
    public function __construct(private PlayerId          $id,
                                private PlayerName        $name,
                                private PlayerNationality $nationality,
                                private PlayerAge         $age,
                                private PlayerPosition    $position,
                                private PlayerShirtNumber $shirtNumber,
                                private PlayerPhotoUrl    $photoUrl,
                                private TeamId            $teamId
    )
    {
    }

    public static function fromPrimitives(array $primitives): self
    {
        return new self(
            PlayerId::fromValue($primitives["id"]),
            PlayerName::fromValue($primitives["name"]),
            PlayerNationality::fromValue($primitives["nationality"]),
            PlayerAge::fromValue($primitives["age"]),
            PlayerPosition::fromValue($primitives["position"]),
            PlayerShirtNumber::fromValue($primitives["shirtNumber"]),
            PlayerPhotoUrl::fromValue($primitives["photoUrl"]),
            TeamId::fromValue($primitives["teamId"] ?? UuidValueObject::random()->value())
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id()->value(),
            'name' => $this->name()->value(),
            'age' => $this->age()->value(),
            'nationality' => $this->nationality()->value(),
            'position' => $this->position()->value(),
            'shirtNumber' => $this->shirtNumber()->value(),
            'photoUrl' => $this->photoUrl()->value(),
            'teamId' => $this->teamId()->value()
        ];
    }

    public function id(): PlayerId
    {
        return $this->id;
    }

    public function name(): PlayerName
    {
        return $this->name;
    }

    public function nationality(): PlayerNationality
    {
        return $this->nationality;
    }

    public function age(): PlayerAge
    {
        return $this->age;
    }

    public function position(): PlayerPosition
    {
        return $this->position;
    }

    public function shirtNumber(): PlayerShirtNumber
    {
        return $this->shirtNumber;
    }

    public function photoUrl(): PlayerPhotoUrl
    {
        return $this->photoUrl;
    }

    public function teamId(): TeamId
    {
        return $this->teamId;
    }
}