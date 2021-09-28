<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Score\Domain;

interface ScoreRepository
{
    public function delete(ScoreId $id): void;

    public function find(ScoreId $id): ?Score;

    public function save(Score $score): void;

    public function search(): Scores;
}