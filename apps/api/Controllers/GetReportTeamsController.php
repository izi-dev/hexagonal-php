<?php

namespace IziDev\Api\Controllers;

use Illuminate\Http\JsonResponse;
use IziDev\WorldChampionship\Report\Application\Generate\GenerateReportTeamsQuery;

final class GetReportTeamsController extends ControllerQuery
{
    public function __invoke(): JsonResponse
    {
        $query = $this->bus->ask(new GenerateReportTeamsQuery);

        return $this->json($query);
    }
}