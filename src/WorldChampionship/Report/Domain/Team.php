<?php

namespace IziDev\WorldChampionship\Report\Domain;

use IziDev\Shared\Domain\Aggregate\AggregateRoot;

class Team extends AggregateRoot
{
    public function __construct(
        private ReportTeamName $name,
        private ReportWin $win,
        private ReportLoss $loss,
        private ReportTeamYellow $yellow,
        private ReportTeamRed $red,
        private ReportTeamGoals $goals,
    )
    {
    }

    public static function fromPrimitives(array $primitives): self
    {
        return new self(
            ReportTeamName::fromValue($primitives["name"]),
            ReportWin::fromValue($primitives["win"]),
            ReportLoss::fromValue($primitives["loss"]),
            ReportTeamYellow::fromValue($primitives["yellow"]),
            ReportTeamRed::fromValue($primitives["red"]),
            ReportTeamGoals::fromValue($primitives["goals"])
        );
    }

    public function toPrimitives(): array
    {
        return [
            'name' => $this->name()->value(),
            'win' => $this->win()->value(),
            'loss' => $this->loss()->value(),
            'yellow' => $this->yellow()->value(),
            'red' => $this->red()->value(),
            'goals' => $this->goals()->value(),
        ];
    }

    public function name(): ReportTeamName
    {
        return $this->name;
    }


    public function win(): ReportWin
    {
        return $this->win;
    }


    public function loss(): ReportLoss
    {
        return $this->loss;
    }

    public function yellow(): ReportTeamYellow
    {
        return $this->yellow;
    }


    public function red(): ReportTeamRed
    {
        return $this->red;
    }


    public function goals(): ReportTeamGoals
    {
        return $this->goals;
    }
}