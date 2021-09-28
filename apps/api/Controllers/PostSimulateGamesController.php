<?php

namespace IziDev\Api\Controllers;

use Illuminate\Http\JsonResponse;
use IziDev\WorldChampionship\Game\Application\Simulate\SimulateGameCommand;

class PostSimulateGamesController extends ControllerCommand
{
    public function __invoke(): JsonResponse
    {
        $this->bus->dispatch(new SimulateGameCommand);

        return $this->json();
    }
}