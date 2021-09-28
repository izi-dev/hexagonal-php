<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Player\Domain;

use IziDev\WorldChampionship\Team\Domain\TeamName;

interface PlayerRepository
{
    public function delete(PlayerId $id): void;

    public function find(PlayerId $id): ?Player;

    public function save(Player $player, TeamName $team): void;

    public function search(): Players;
}