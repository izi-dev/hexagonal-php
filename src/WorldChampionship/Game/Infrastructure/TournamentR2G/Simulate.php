<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Game\Infrastructure\TournamentR2G;

use IziDev\Shared\Domain\ValueObject\UuidValueObject;
use IziDev\WorldChampionship\Game\Domain\Game;
use IziDev\WorldChampionship\Game\Domain\Games;
use IziDev\WorldChampionship\Game\Domain\SimulateRepository;
use IziDev\WorldChampionship\Infraction\Domain\Infraction;
use IziDev\WorldChampionship\Infraction\Domain\Infractions;
use IziDev\WorldChampionship\Player\Domain\Players;
use IziDev\WorldChampionship\Team\Domain\Team;
use IziDev\WorldChampionship\Team\Domain\Teams;
use TournamentGenerator\Preset\R2G;
use \IziDev\WorldChampionship\Game\Domain\Simulate as SimulateDomain;

final class Simulate implements SimulateRepository
{
    public function generator(Teams $teams, Players $players): SimulateDomain
    {
        $tournament = $this->generateR2G($teams->all());
        $games = $this->toDomainGames($tournament->getGames());
        $teams = $this->toDomainTeams($teams, $games);
        $infractions = $this->toDomainInfractions($players->all(), $games);

        return new SimulateDomain(
            new Games($games),
            new Teams($teams),
            new Infractions($infractions)
        );
    }

    private function generateR2G(array $teams): R2G
    {
        $tournament = new R2G('Tournament');

        foreach ($teams as $team) {
            $tournament->team($team->name()->value(), $team->id()->value());
        }

        $tournament->generate();
        $tournament->genGamesSimulateReal();

        return $tournament;
    }

    private function toDomainGames(array $games)
    {
        return collect($games)->map(fn($game) => $this->toDomainGame($game))->toArray();
    }

    private function toDomainGame($game)
    {

        $home = collect($game->getTeams())->first()->getId();
        $away = collect($game->getTeams())->last()->getId();
        $results = $game->getResults();
        $goalHome = (int)round($results[$home]["score"] / 100);
        $goalAway = (int)round($results[$away]["score"] / 100);

        return Game::fromPrimitives([
            'id' => UuidValueObject::random()->value(),
            'teamIdHome' => $home,
            'teamIdAway' => $away,
            'day' => $game->getId(),
            'home' => $goalAway == $goalHome ? $goalHome + 1 : $goalHome,
            'away' => $goalAway == $goalHome ? $goalAway - 1 : $goalAway,
            'win' => $game->getWin(),
            'loss' => $game->getLoss(),
        ]);
    }

    private function toDomainTeams(Teams $teams, array $games): array
    {
        return collect($teams->all())->map(function ($team) use ($games) {
            $wins = collect($games)->filter(fn($game) => $game->win() == $team->id())->count();
            $loss = collect($games)->filter(fn($game) => $game->loss() == $team->id())->count();

            return Team::fromPrimitives([
                'id' => $team->id()->value(),
                'name' => $team->name()->value(),
                'flagUrl' => $team->flagUrl()->value(),
                'points' => $wins * 3,
                'wins' => $wins,
                'loss' => $loss,
            ]);
        })->toArray();
    }

    private function toDomainInfractions(array $players, array $games): array
    {
        $infractions = [];
        foreach ($games as $game) {
            foreach ($players as $player) {
                if ($game->teamIdHome() == $player->teamId()) {
                    $infractions[] = $this->toDomainInfraction($player, $game);
                }

                if ($game->teamIdAway() == $player->teamId()) {
                    $infractions[] = $this->toDomainInfraction($player, $game);
                }
            }
        }

        return collect($infractions)
            ->filter(fn($infraction) => $infraction->yellowCard()->value() != 0 && $infraction->yellowCard()->value() != 0)
            ->toArray();
    }

    private function toDomainInfraction($player, $game)
    {
        return  Infraction::fromPrimitives([
            'id' => UuidValueObject::random()->value(),
            'playerId' => $player->id()->value(),
            'teamId' => $player->teamId()->value(),
            'gameId' => $game->id()->value(),
            'yellowCard' => $yellowPlayer = collect([0,0,0,0,0,0,0,0,1,1,1,1,2,0,0,1])->random(),
            'redCard' => $yellowPlayer == 2 ? 1 :collect([0,0,0,0,0,0,0,0,1,1,0,0,0,0,0])->random(),
        ]);
    }
}