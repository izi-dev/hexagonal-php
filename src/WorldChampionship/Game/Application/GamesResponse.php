<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Game\Application;

use IziDev\Shared\Domain\Bus\Query\Response;
use IziDev\WorldChampionship\Game\Domain\Games;

final class GamesResponse implements Response
{
    public function __construct(private array $games)
    {
    }

    public static function fromPlayers(Games $games): self
    {
        $responses = array_map(
            fn($game) => GameResponse::fromGame($game),
            $games->all()
        );

        return new self($responses);
    }

    public function toArray(): array
    {
        return array_map(fn(GameResponse $response) => $response->toArray(), $this->games);
    }
}