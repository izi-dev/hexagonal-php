<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Team\Infrastructure\Persistence\Eloquent;

use IziDev\WorldChampionship\Team\Domain\Team;
use IziDev\WorldChampionship\Team\Domain\TeamId;
use IziDev\WorldChampionship\Team\Domain\Teams;
use IziDev\WorldChampionship\Team\Domain\TeamRepository as Repository;

final class TeamRepository implements Repository
{
    public function delete(TeamId $id): void
    {
        TeamModel::query()->find($id->value())->delete();
    }

    public function find(TeamId $id): ?Team
    {
        $team = TeamModel::query()->find($id->value());
        if (null === $team) return null;

        return $this->toDomain($team);
    }

    private function toDomain(TeamModel $model): Team
    {
        return Team::fromPrimitives($model->toArray());
    }

    public function save(Team $team): void
    {
        TeamModel::query()->create($team->toPrimitives());
    }

    public function search(): Teams
    {
        $teams = TeamModel::query()->get()->map(fn($model) => $this->toDomain($model))->toArray();

        return new Teams($teams);
    }

    public function update(Team $team): void
    {
        $model = TeamModel::query()->find($team->id()->value());
        $model->update($team->toPrimitives());
    }
}