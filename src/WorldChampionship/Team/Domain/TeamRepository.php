<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Team\Domain;

interface TeamRepository
{
    public function delete(TeamId $id): void;

    public function find(TeamId $id): ?Team;

    public function save(Team $team): void;

    public function update(Team $team): void;

    public function search(): Teams;
}