<?php

namespace IziDev\Api\Controllers;

use Illuminate\Http\JsonResponse;
use IziDev\WorldChampionship\Report\Application\Generate\GenerateReportGameQuery;

final class GetReportGamesController extends ControllerQuery
{
    public function __invoke(): JsonResponse
    {
        $query = $this->bus->ask(new GenerateReportGameQuery);

        return $this->json($query);
    }
}