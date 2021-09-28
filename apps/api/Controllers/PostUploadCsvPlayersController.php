<?php declare(strict_types=1);

namespace IziDev\Api\Controllers;

use Illuminate\Http\JsonResponse;

use IziDev\Shared\Domain\ValueObject\UuidValueObject;
use IziDev\WorldChampionship\Player\Application\Create\CreatePlayerCommand;
use Spatie\SimpleExcel\SimpleExcelReader;

final class PostUploadCsvPlayersController extends ControllerCommand
{
    public function __invoke(): JsonResponse
    {
        $rows = SimpleExcelReader::create($this->move("players"))->getRows();

        $rows->each(fn(array $row) => $this->bus->dispatch(
            new CreatePlayerCommand(
                UuidValueObject::random()->value(),
                $row["name"],
                $row["nationality"],
                (int)$row["age"],
                $row["position"],
                (int)$row["shirtNumber"],
                $row["photoUrl"],
                $row["team"],
            )
        ));

        return $this->json();
    }
}