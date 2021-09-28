<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Infraction\Infrastructure\Persistence\Eloquent;

use IziDev\WorldChampionship\Infraction\Domain\Infraction;
use IziDev\WorldChampionship\Infraction\Domain\InfractionId;
use IziDev\WorldChampionship\Infraction\Domain\Infractions;
use IziDev\WorldChampionship\Infraction\Domain\InfractionRepository as Repository;

final class InfractionRepository implements Repository
{
    public function delete(InfractionId $id): void
    {
        InfractionModel::query()->find($id->value())->delete();
    }

    public function find(InfractionId $id): ?Infraction
    {
        $infraction = InfractionModel::query()->find($id->value());
        if (null === $infraction) return null;

        return $this->toDomain($infraction);
    }

    private function toDomain(InfractionModel $model): Infraction
    {
        return Infraction::fromPrimitives($model->toArray());
    }

    public function save(Infraction $infraction): void
    {
        InfractionModel::query()->create($infraction->toPrimitives());
    }

    public function search(): Infractions
    {
        $infractions = InfractionModel::query()->get()->map(fn($model) => $this->toDomain($model))->toArray();

        return new Infractions($infractions);
    }
}