<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Report\Infrastructure\Persistence\Eloquent;

use IziDev\WorldChampionship\Report\Domain\Game;
use IziDev\WorldChampionship\Report\Domain\Games;
use IziDev\WorldChampionship\Report\Domain\Team;
use IziDev\WorldChampionship\Report\Domain\Teams;
use IziDev\WorldChampionship\Report\Domain\ReportRepository as Repository;
use IziDev\WorldChampionship\Game\Infrastructure\Persistence\Eloquent\GameModel;
use IziDev\WorldChampionship\Infraction\Infrastructure\Persistence\Eloquent\InfractionModel;
use IziDev\WorldChampionship\Team\Infrastructure\Persistence\Eloquent\TeamModel;


final class ReportRepository implements Repository
{
    public function generateGames(): Games
    {
        $games = GameModel::query()
            ->select(
                'games.id as gameId',
                'home.name as homeName',
                'home.id as homeId',
                'away.name as awayName',
                'away.id as awayId',
                'day as order',
                'games.home as homeScore',
                'games.away as awayScore',
            )
            ->join('teams as home', 'home.id', '=', 'games.teamIdHome')
            ->join('teams as away', 'away.id', '=', 'games.teamIdAway')
            ->leftJoin(
                'infractions as infractionHome',
                fn($join) => $join->on('infractionHome.gameId', '=', 'games.id')->on('infractionHome.teamId', '=', 'home.id')
            )->leftJoin(
                'infractions as infractionAway',
                fn($join) => $join->on('infractionAway.gameId', '=', 'games.id')->on('infractionAway.teamId', '=', 'away.id')
            )
            ->orderBy('day')
            ->groupBy(
                'games.id',
                'home.name',
                'home.id',
                'away.name',
                'away.id',
                'day',
                'games.home',
                'games.away',
            )
            ->get()
            ->map(fn($model) => Game::fromPrimitives([
                'homeName' => $model->homeName,
                'awayName' => $model->awayName,
                'order' => $model->order,
                'homeScore' => $model->homeScore,
                'awayScore' => $model->awayScore,
                'homeYellowCard' => InfractionModel::query()
                    ->where('gameId', '=', $model->gameId)
                    ->where('teamId', '=', $model->homeId)
                    ->sum('yellowCard'),
                'awayYellowCard' => InfractionModel::query()
                    ->where('gameId', '=', $model->gameId)
                    ->where('teamId', '=', $model->awayId)
                    ->sum('yellowCard'),
                'homeRedCard' => InfractionModel::query()
                    ->where('gameId', '=', $model->gameId)
                    ->where('teamId', '=', $model->homeId)
                    ->sum('redCard'),
                'awayRedCard' => InfractionModel::query()
                    ->where('gameId', '=', $model->gameId)
                    ->where('teamId', '=', $model->awayId)
                    ->sum('redCard'),
            ]))
            ->toArray();

        return new Games($games);
    }

    public function generateTeams(): Teams
    {
        $teams = TeamModel::query()
            ->orderByDesc('points')
            ->get()
            ->map(fn($model) => Team::fromPrimitives([
                'name' => $model->name,
                'win' => $model->wins,
                'loss' => $model->loss,
                'yellow' => InfractionModel::query()->where('teamId', '=', $model->id)->sum('yellowCard'),
                'red' => InfractionModel::query()->where('teamId', '=', $model->id)->sum('redCard'),
                'goals' =>
                    GameModel::query()->where('teamIdHome', '=', $model->id)->sum('home') +
                    GameModel::query()->where('teamIdAway', '=', $model->id)->sum('away'),
            ]))->toArray();

        return new Teams($teams);
    }
}