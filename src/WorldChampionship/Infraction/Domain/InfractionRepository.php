<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Infraction\Domain;

interface InfractionRepository
{
    public function delete(InfractionId $id): void;

    public function find(InfractionId $id): ?Infraction;

    public function save(Infraction $infraction): void;

    public function search(): Infractions;
}