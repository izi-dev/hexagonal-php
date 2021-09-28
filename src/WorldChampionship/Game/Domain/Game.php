<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Game\Domain;

use IziDev\Shared\Domain\Aggregate\AggregateRoot;
use IziDev\WorldChampionship\Team\Domain\TeamId;

final class Game extends AggregateRoot
{
    public function __construct(
        private GameId $id,
        private TeamId $teamIdHome,
        private TeamId $teamIdAway,
        private GameDay $day,
        private GameHome $home,
        private GameAway $away,
        private TeamId $win,
        private TeamId $loss,
    )
    {
    }

    public static function fromPrimitives(array $primitives): self
    {
        return new self(
            GameId::fromValue($primitives["id"]),
            TeamId::fromValue($primitives["teamIdHome"]),
            TeamId::fromValue($primitives["teamIdAway"]),
            GameDay::fromValue($primitives["day"]),
            GameHome::fromValue($primitives["home"]),
            GameAway::fromValue($primitives["away"]),
            TeamId::fromValue($primitives["win"]),
            TeamId::fromValue($primitives["loss"]),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id()->value(),
            'teamIdHome' => $this->teamIdHome()->value(),
            'teamIdAway' => $this->teamIdAway()->value(),
            'day' => $this->day()->value(),
            'home' => $this->home()->value(),
            'away' => $this->away()->value(),
            'win' => $this->win()->value(),
            'loss' => $this->loss()->value(),
        ];
    }

    public function id(): GameId
    {
        return $this->id;
    }

    public function teamIdHome(): TeamId
    {
        return $this->teamIdHome;
    }

    public function teamIdAway(): TeamId
    {
        return $this->teamIdAway;
    }

    public function day(): GameDay
    {
        return $this->day;
    }

    public function home(): GameHome
    {
        return $this->home;
    }

    public function away(): GameAway
    {
        return $this->away;
    }

    public function win(): TeamId
    {
        return $this->win;
    }

    public function loss(): TeamId
    {
        return $this->loss;
    }
}