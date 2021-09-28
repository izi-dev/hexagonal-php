<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Team\Application;

use IziDev\Shared\Domain\Bus\Query\Response;
use IziDev\WorldChampionship\Team\Domain\Teams;

final class TeamsResponse implements Response
{
    public function __construct(private array $teams)
    {
    }

    public static function fromTeams(Teams $teams): self
    {
        $responses = array_map(
            fn($team) => TeamResponse::fromTeam($team),
            $teams->all()
        );

        return new self($responses);
    }

    public function toArray(): array
    {
        return array_map(fn(TeamResponse $response) => $response->toArray(), $this->teams);
    }
}