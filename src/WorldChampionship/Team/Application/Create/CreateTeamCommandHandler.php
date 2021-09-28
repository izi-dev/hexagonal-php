<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Team\Application\Create;

use IziDev\WorldChampionship\Team\Domain\Team;
use IziDev\Shared\Domain\Bus\Command\CommandHandler;
use IziDev\WorldChampionship\Team\Domain\TeamRepository;

final class CreateTeamCommandHandler implements CommandHandler
{
    public function __construct(private TeamRepository $repository)
    {
    }

    public function __invoke(CreateTeamCommand $command)
    {
        $player = Team::fromPrimitives([
            'id' => $command->id(),
            'name' => $command->name(),
            'flagUrl' => $command->flagUrl()
        ]);

        $this->repository->save($player);
    }
}