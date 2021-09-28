<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Infraction\Application\Create;

use IziDev\Shared\Domain\Bus\Command\CommandHandler;
use IziDev\WorldChampionship\Infraction\Domain\Infraction;
use IziDev\WorldChampionship\Infraction\Domain\InfractionRepository;

final class CreateInfractionCommandHandler implements CommandHandler
{
    public function __construct(private InfractionRepository $repository)
    {
    }

    public function __invoke(CreateInfractionCommand $command)
    {
        $infraction = Infraction::fromPrimitives([
            'id' => $command->id(),
            'playerId' => $command->playerId(),
            'teamId' => $command->teamId(),
            'gameId' => $command->gameId(),
            'yellowCard' => $command->yellowCard(),
            'redCard' => $command->redCard(),
        ]);

        $this->repository->save($infraction);
    }
}