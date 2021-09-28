<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Report\Application;

use IziDev\Shared\Domain\Bus\Query\Response;
use IziDev\WorldChampionship\Report\Domain\Game;
use IziDev\WorldChampionship\Report\Domain\Team;

final class ReportTeamResponse implements Response
{
    public function __construct(
        private string $name,
        private int    $wins,
        private int    $loss,
        private int    $yellow,
        private int    $red,
        private int    $goals,
    )
    {
    }

    public static function fromTeam(Team $team): self
    {
        return new self(
            $team->name()->value(),
            $team->win()->value(),
            $team->loss()->value(),
            $team->yellow()->value(),
            $team->red()->value(),
            $team->goals()->value()
        );
    }

    public function name(): string
    {
        return $this->name;
    }

    public function win(): int
    {
        return $this->wins;
    }

    public function loss(): int
    {
        return $this->loss;
    }

    public function yellow(): int
    {
        return $this->yellow;
    }

    public function red(): int
    {
        return $this->red;
    }

    public function goals(): int
    {
        return $this->goals;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name(),
            'win' => $this->win(),
            'loss' => $this->loss(),
            'yellow' => $this->yellow(),
            'red' => $this->red(),
            'goals' => $this->goals(),
        ];
    }
}