<?php

namespace IziDev\WorldChampionship\Report\Domain;

use IziDev\Shared\Domain\Aggregate\AggregateRoot;

final class Game extends AggregateRoot
{
    public function __construct(
        private ReportGamesHomeName $homeName,
        private ReportGamesAwayName $awayName,
        private ReportGamesOrder $order,
        private ReportGameHomeScore $homeScore,
        private ReportGameAwayScore $awayScore,
        private ReportGameHomeYellowCard $homeYellowCard,
        private ReportGameAwayYellowCard $awayYellowCard,
        private ReportGameHomeRedCard $homeRedCard,
        private ReportGameAwayRedCard $awayRedCard,
    )
    {

    }

    public static function fromPrimitives(array $primitives): self
    {
        return new self(
            ReportGamesHomeName::fromValue($primitives["homeName"]),
            ReportGamesAwayName::fromValue($primitives["awayName"]),
            ReportGamesOrder::fromValue($primitives["order"]),
            ReportGameHomeScore::fromValue($primitives["homeScore"]),
            ReportGameAwayScore::fromValue($primitives["awayScore"]),
            ReportGameHomeYellowCard::fromValue($primitives["homeYellowCard"]),
            ReportGameAwayYellowCard::fromValue($primitives["awayYellowCard"]),
            ReportGameHomeRedCard::fromValue($primitives["homeRedCard"]),
            ReportGameAwayRedCard::fromValue($primitives["awayRedCard"])
        );
    }

    public function toPrimitives(): array
    {
        return [
            'homeName' => $this->homeName()->value(),
            'awayName' => $this->awayName()->value(),
            'order' => $this->order()->value(),
            'homeScore' => $this->homeScore()->value(),
            'awayScore' => $this->awayScore()->value(),
            'homeYellowCard' => $this->homeYellowCard()->value(),
            'awayYellowCard' => $this->awayYellowCard()->value(),
            'homeRedCard' => $this->homeRedCard()->value(),
            'awayRedCard' => $this->awayRedCard()->value(),
        ];
    }

    public function homeName(): ReportGamesHomeName
    {
        return $this->homeName;
    }

    public function awayName(): ReportGamesAwayName
    {
        return $this->awayName;
    }

    public function order(): ReportGamesOrder
    {
        return $this->order;
    }

    public function homeScore(): ReportGameHomeScore
    {
        return $this->homeScore;
    }

    public function awayRedCard(): ReportGameAwayRedCard
    {
        return $this->awayRedCard;
    }

    public function awayScore(): ReportGameAwayScore
    {
        return $this->awayScore;
    }

    public function awayYellowCard(): ReportGameAwayYellowCard
    {
        return $this->awayYellowCard;
    }

    public function homeYellowCard(): ReportGameHomeYellowCard
    {
        return $this->homeYellowCard;
    }

    public function homeRedCard(): ReportGameHomeRedCard
    {
        return $this->homeRedCard;
    }
}