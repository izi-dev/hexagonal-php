<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Report\Application;

use IziDev\Shared\Domain\Bus\Query\Response;
use IziDev\WorldChampionship\Report\Domain\Teams;

final class ReportTeamsResponse implements Response
{
    public function __construct(private array $teams)
    {
    }

    public static function fromTeams(Teams $teams): self
    {
        $responses = array_map(
            fn($team) => ReportTeamResponse::fromTeam($team),
            $teams->all()
        );

        return new self($responses);
    }

    public function toArray(): array
    {
        return array_map(fn(ReportTeamResponse $response) => $response->toArray(), $this->teams);
    }
}