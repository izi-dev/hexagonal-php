<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Team\Application;

use IziDev\Shared\Domain\Bus\Query\Response;
use IziDev\WorldChampionship\Player\Domain\Player;
use IziDev\WorldChampionship\Team\Domain\Team;

final class TeamResponse implements Response
{
    public function __construct(
        private string $id,
        private string $name,
        private string $flagUrl,
        private int    $points,
        private int    $wins,
        private int    $loss,
    )
    {
    }

    public static function fromTeam(Team $team): self
    {
        return new self(
            $team->id()->value(),
            $team->name()->value(),
            $team->flagUrl()->value(),
            $team->points()->value(),
            $team->wins()->value(),
            $team->loss()->value(),
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

    public function flagUrl(): string
    {
        return $this->flagUrl;
    }

    public function points(): int
    {
        return $this->points;
    }

    public function wins(): int
    {
        return $this->wins;
    }

    public function loss(): int
    {
        return $this->loss;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'wins' => $this->wins,
            'loss' => $this->loss,
            'points' => $this->points,
        ];
    }
}