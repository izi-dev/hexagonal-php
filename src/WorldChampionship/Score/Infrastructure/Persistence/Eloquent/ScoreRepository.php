<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Score\Infrastructure\Persistence\Eloquent;

use IziDev\WorldChampionship\Score\Domain\Score;
use IziDev\WorldChampionship\Score\Domain\ScoreId;
use IziDev\WorldChampionship\Score\Domain\Scores;
use IziDev\WorldChampionship\Score\Domain\ScoreRepository as Repository;

final class ScoreRepository implements Repository
{
    public function delete(ScoreId $id): void
    {
        ScoreModel::query()->find($id->value())->delete();
    }

    public function find(ScoreId $id): ?Score
    {
        $score = ScoreModel::query()->find($id->value());
        if (null === $score) return null;

        return $this->toDomain($score);
    }

    private function toDomain(ScoreModel $model): Score
    {
        return Score::fromPrimitives($model->toArray());
    }

    public function save(Score $score): void
    {
        ScoreModel::query()->create($score->toPrimitives());
    }

    public function search(): Scores
    {
        $scores = ScoreModel::query()->get()->map(fn($model) => $this->toDomain($model))->toArray();

        return new Scores($scores);
    }
}