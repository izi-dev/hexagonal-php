<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Game\Application\Simulate;

use IziDev\Shared\Domain\Bus\Command\CommandHandler;
use IziDev\WorldChampionship\Game\Domain\GameRepository;
use IziDev\WorldChampionship\Game\Domain\SimulateRepository;
use IziDev\WorldChampionship\Infraction\Domain\Infraction;
use IziDev\WorldChampionship\Infraction\Domain\InfractionRepository;
use IziDev\WorldChampionship\Player\Domain\PlayerRepository;
use IziDev\WorldChampionship\Team\Domain\TeamRepository;

final class SimulateGameCommandHandler implements CommandHandler
{
    public function __construct(
        private TeamRepository $team,
        private GameRepository $game,
        private PlayerRepository $player,
        private InfractionRepository $infraction,
        private SimulateRepository $simulate,
    )
    {
    }

    public function __invoke(SimulateGameCommand $query)
    {
        $teams = $this->team->search();
        $players = $this->player->search();

        if (count($this->game->search()->all()) != 0) {
            throw new \Exception("SIMULATE COMPLETED");
        }

        $simulate = $this->simulate->generator($teams, $players);
        collect($simulate->games()->all())->each(fn($game) => $this->game->save($game));
        collect($simulate->infractions()->all())->each(fn($infraction) => $this->infraction->save($infraction));
        collect($simulate->teams()->all())->each(fn($team) => $this->team->update($team));
    }
}