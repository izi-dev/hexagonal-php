<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Game\Domain;

interface GameRepository
{
    public function delete(GameId $id): void;

    public function find(GameId $id): ?Game;

    public function save(Game $game): void;

    public function search(): Games;
}