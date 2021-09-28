<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Team\Domain;

use IziDev\Shared\Domain\Aggregate\AggregateRoot;

final class Team extends AggregateRoot
{
    public function __construct(
        private TeamId      $id,
        private TeamName    $name,
        private TeamFlagUrl $flagUrl,
        private ?TeamPoint  $points = null,
        private ?TeamWins   $wins = null,
        private ?TeamLoss   $loss = null,
    )
    {
    }

    public static function fromPrimitives(array $primitives): self
    {
        return new self(
            TeamId::fromValue($primitives['id']),
            TeamName::fromValue($primitives['name']),
            TeamFlagUrl::fromValue($primitives['flagUrl']),
            TeamPoint::fromValue($primitives['points'] ?? 0),
            TeamWins::fromValue($primitives['wins'] ?? 0),
            TeamLoss::fromValue($primitives['loss'] ?? 0),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id()->value(),
            'name' => $this->name()->value(),
            'flagUrl' => $this->flagUrl()->value(),
            'points' => $this->points()->value(),
            'wins' => $this->wins()->value(),
            'loss' => $this->loss()->value(),
        ];
    }

    public function id(): TeamId
    {
        return $this->id;
    }

    public function name(): TeamName
    {
        return $this->name;
    }

    public function flagUrl(): TeamFlagUrl
    {
        return $this->flagUrl;
    }

    public function points(): TeamPoint
    {
        return $this->points;
    }

    public function wins(): TeamWins
    {
        return $this->wins;
    }

    public function loss(): TeamLoss
    {
        return $this->loss;
    }

    public function updatePoints(TeamPoint $points)
    {
        $this->points = $points;
    }

    public function updateWins(TeamWins $wins)
    {
        $this->wins = $wins;
    }

    public function updateLoss(TeamLoss $loss)
    {
        $this->loss = $loss;
    }
}