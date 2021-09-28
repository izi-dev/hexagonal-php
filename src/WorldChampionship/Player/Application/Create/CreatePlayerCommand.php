<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Player\Application\Create;

use IziDev\Shared\Domain\Bus\Command\Command;

final class CreatePlayerCommand implements Command
{
    public function __construct(private string $id,
                                private string $name,
                                private string $nationality,
                                private int    $age,
                                private string $position,
                                private int    $shirtNumber,
                                private string $photoUrl,
                                private string $teamName)
    {
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

    public function teamName(): string
    {
        return $this->teamName;
    }

    public function commandName(): string
    {
        return "world.championship.player.create";
    }
}