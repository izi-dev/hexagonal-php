<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Player\Application\Create;

use IziDev\Shared\Domain\Bus\Command\CommandHandler;
use IziDev\WorldChampionship\Player\Domain\Player;
use IziDev\WorldChampionship\Player\Domain\PlayerRepository;
use IziDev\WorldChampionship\Team\Domain\TeamName;

final class CreatePlayerCommandHandler implements CommandHandler
{
    public function __construct(private PlayerRepository $repository)
    {
    }

    public function __invoke(CreatePlayerCommand $command)
    {
        $player = Player::fromPrimitives([
            'id' => $command->id(),
            'name' => $command->name(),
            'nationality' => $command->nationality(),
            'age' => $command->age(),
            'position' => $command->position(),
            'shirtNumber' => $command->shirtNumber(),
            'photoUrl' => $command->photoUrl(),
        ]);

        $this->repository->save($player, TeamName::fromValue($command->teamName()));
    }
}