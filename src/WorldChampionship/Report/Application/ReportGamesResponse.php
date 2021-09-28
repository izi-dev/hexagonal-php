<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Report\Application;

use IziDev\Shared\Domain\Bus\Query\Response;
use IziDev\WorldChampionship\Report\Domain\Games;

final class ReportGamesResponse implements Response
{
    public function __construct(private array $games)
    {
    }

    public static function fromGames(Games $games): self
    {
        $responses = array_map(
            fn($game) => ReportGameResponse::fromGame($game),
            $games->all()
        );

        return new self($responses);
    }

    public function toArray(): array
    {
        return array_map(fn(ReportGameResponse $response) => $response->toArray(), $this->games);
    }
}