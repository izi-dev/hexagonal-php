<?php

namespace IziDev\Api\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use IziDev\Shared\Domain\Bus\Command\CommandBus;

abstract class ControllerCommand
{
    public function __construct(protected CommandBus $bus, protected Request $request)
    {
    }

    protected function move($name): string
    {
        $request = $this->request->all();
        $file = str_replace("tmp", "csv", $request[$name]->getFilename());
        $newDir = __DIR__ . "/../../../Storage/$name/" . $file;
        move_uploaded_file($request[$name]->getPathName(), $newDir);

        return $newDir;
    }

    protected function json(): JsonResponse
    {
        return new JsonResponse(
            [
                'message' => 'completed'
            ],
            200,
            ['Access-Control-Allow-Origin' => '*']
        );
    }
}