<?php

namespace IziDev\Api\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use IziDev\Shared\Domain\Bus\Query\QueryBus;

abstract class ControllerQuery
{
    public function __construct(protected QueryBus $bus, protected Request $request)
    {
    }


    protected function json($data): JsonResponse
    {
        return new JsonResponse(
            [
                'data' => $data->toArray()
            ],
            200,
            ['Access-Control-Allow-Origin' => '*']
        );
    }
}