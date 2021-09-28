<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Player\Infrastructure\Persistence\Eloquent;

use IziDev\WorldChampionship\Player\Domain\Player;
use IziDev\WorldChampionship\Player\Domain\PlayerId;
use IziDev\WorldChampionship\Player\Domain\Players;
use IziDev\WorldChampionship\Player\Domain\PlayerRepository as Repository;
use IziDev\WorldChampionship\Team\Domain\TeamName;
use IziDev\WorldChampionship\Team\Infrastructure\Persistence\Eloquent\TeamModel;

final class PlayerRepository implements Repository
{
    public function delete(PlayerId $id): void
    {
        PlayerModel::query()->find($id->value())->delete();
    }

    public function find(PlayerId $id): ?Player
    {
        $player = PlayerModel::query()->find($id->value());
        if (null === $player) return null;

        return $this->toDomain($player);
    }

    private function toDomain(PlayerModel $model): Player
    {
        return Player::fromPrimitives($model->toArray());
    }

    public function save(Player $player, TeamName $teamName): void
    {
        $team = TeamModel::query()->where("name", $teamName->value())->firstOrFail();

        PlayerModel::query()->create(array_merge($player->toPrimitives(), [
            "teamId" => $team->id
        ]));
    }

    public function search(): Players
    {
        $players = PlayerModel::query()->get()->map(fn($model) => $this->toDomain($model))->toArray();

        return new Players($players);
    }
}