<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Score\Application\Create;

use IziDev\WorldChampionship\Score\Domain\Score;
use IziDev\Shared\Domain\Bus\Command\CommandHandler;
use IziDev\WorldChampionship\Score\Domain\ScoreRepository;
use IziDev\WorldChampionship\Score\Application\Create\CreateScoreCommand;

final class CreateScoreCommandHandler implements CommandHandler
{
    public function __construct(private ScoreRepository $repository)
    {
    }

    public function __invoke(CreateScoreCommand $command)
    {
        $player = Score::fromPrimitives([
            'id' => $command->id(),
            'gameId' => $command->gameId(),
            'playerId' => $command->playerId(),
            'teamId' => $command->teamId(),
            'goal' => $command->goal(),
        ]);

        $this->repository->save($player);
    }
}