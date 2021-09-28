<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Report\Domain;

interface ReportRepository
{
    public function generateGames(): Games;
    public function generateTeams(): Teams;
}