<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Player\Application;

use IziDev\Shared\Domain\Bus\Query\Response;
use IziDev\WorldChampionship\Player\Domain\Player;

final class PlayerResponse implements Response
{
    public function __construct(private string $id,
                                private string $name,
                                private string $nationality,
                                private int    $age,
                                private string $position,
                                private int    $shirtNumber,
                                private string $photoUrl,
                                private string $teamId)
    {
    }

    public static function fromPlayer(Player $player): self
    {
        return new self(
            $player->id()->value(),
            $player->name()->value(),
            $player->nationality()->value(),
            $player->age()->value(),
            $player->position()->value(),
            $player->shirtNumber()->value(),
            $player->photoUrl()->value(),
            $player->teamId()->value()
        );
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function nationality(): string
    {
        return $this->nationality;
    }

    public function age(): int
    {
        return $this->age;
    }

    public function position(): string
    {
        return $this->position;
    }

    public function shirtNumber(): int
    {
        return $this->shirtNumber;
    }

    public function photoUrl(): string
    {
        return $this->photoUrl;
    }

    public function teamId(): string
    {
        return $this->teamId;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->age,
            'nationality' => $this->nationality,
            'position' => $this->position,
            'shirtNumber' => $this->shirtNumber,
            'photoUrl' => $this->photoUrl,
            'teamId' => $this->teamId
        ];
    }
}