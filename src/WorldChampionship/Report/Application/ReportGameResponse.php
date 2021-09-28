<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Report\Application;

use IziDev\Shared\Domain\Bus\Query\Response;
use IziDev\WorldChampionship\Report\Domain\Game;

final class ReportGameResponse implements Response
{
    public function __construct(
        private string $homeName,
        private string $awayName,
        private int $order,
        private int $homeScore,
        private int $awayScore,
        private int $homeYellowCard,
        private int $awayYellowCard,
        private int $homeRedCard,
        private int $awayRedCard,
    )
    {
    }

    public static function fromGame(Game $game): self
    {
        return new self(
            $game->homeName()->value(),
            $game->awayName()->value(),
            $game->order()->value(),
            $game->homeScore()->value(),
            $game->awayScore()->value(),
            $game->homeYellowCard()->value(),
            $game->awayYellowCard()->value(),
            $game->homeRedCard()->value(),
            $game->awayRedCard()->value(),
        );
    }

    public function homeName(): string
    {
        return $this->homeName;
    }

    public function awayName(): string
    {
        return $this->awayName;
    }

    public function order(): int
    {
        return $this->order;
    }

    public function homeScore(): int
    {
        return $this->homeScore;
    }

    public function awayRedCard(): int
    {
        return $this->awayRedCard;
    }

    public function awayScore(): int
    {
        return $this->awayScore;
    }

    public function awayYellowCard(): int
    {
        return $this->awayYellowCard;
    }

    public function homeYellowCard(): int
    {
        return $this->homeYellowCard;
    }

    public function homeRedCard(): int
    {
        return $this->homeRedCard;
    }

    public function toArray(): array
    {
        return [
            'homeName' => $this->homeName(),
            'awayName' => $this->awayName(),
            'order' => $this->order(),
            'homeScore' => $this->homeScore(),
            'awayScore' => $this->awayScore(),
            'homeYellowCard' => $this->homeYellowCard(),
            'awayYellowCard' => $this->awayYellowCard(),
            'homeRedCard' => $this->homeRedCard(),
            'awayRedCard' => $this->awayRedCard(),
        ];
    }
}