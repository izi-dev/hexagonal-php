<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Game\Application\Create;

use IziDev\WorldChampionship\Game\Domain\Game;
use IziDev\Shared\Domain\Bus\Command\CommandHandler;
use IziDev\WorldChampionship\Game\Domain\GameRepository;

final class CreateGameCommandHandler implements CommandHandler
{
    public function __construct(private GameRepository $repository)
    {
    }

    public function __invoke(CreateGameCommand $command)
    {
        $player = Game::fromPrimitives([
            'id' => $command->id(),
            'teamIdHome' => $command->teamIdHome(),
            'teamIdAway' => $command->teamIdAway(),
            'day' => $command->day(),
            'home' => $command->home(),
            'away' => $command->away(),
        ]);

        $this->repository->save($player);
    }
}