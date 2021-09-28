<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Player\Application;

use IziDev\Shared\Domain\Bus\Query\Response;
use IziDev\WorldChampionship\Player\Domain\Players;

final class PlayersResponse implements Response
{
    public function __construct(private array $players)
    {
    }

    public static function fromPlayers(Players $players): self
    {
        $responses = array_map(
            fn($player) => PlayerResponse::fromPlayer($player),
            $players->all()
        );

        return new self($responses);
    }

    public function toArray(): array
    {
        return array_map(fn(PlayerResponse $response) => $response->toArray(), $this->players);
    }
}