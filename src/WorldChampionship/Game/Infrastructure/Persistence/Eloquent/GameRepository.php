<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Game\Infrastructure\Persistence\Eloquent;

use IziDev\WorldChampionship\Game\Domain\Game;
use IziDev\WorldChampionship\Game\Domain\GameId;
use IziDev\WorldChampionship\Game\Domain\Games;
use IziDev\WorldChampionship\Game\Domain\GameRepository as Repository;

final class GameRepository implements Repository
{
    public function delete(GameId $id): void
    {
        GameModel::query()->find($id->value())->delete();
    }

    public function find(GameId $id): ?Game
    {
        $game = GameModel::query()->find($id->value());
        if (null === $game) return null;

        return $this->toDomain($game);
    }

    private function toDomain(GameModel $model): Game
    {
        return Game::fromPrimitives($model->toArray());
    }

    public function save(Game $game): void
    {
        GameModel::query()->create($game->toPrimitives());
    }

    public function search(): Games
    {
        $games = GameModel::query()->get()->map(fn($model) => $this->toDomain($model))->toArray();

        return new Games($games);
    }
}