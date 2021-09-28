<?php declare(strict_types=1);

namespace IziDev\Api\Controllers;

use Illuminate\Http\JsonResponse;
use IziDev\Shared\Domain\ValueObject\UuidValueObject;
use IziDev\WorldChampionship\Team\Application\Create\CreateTeamCommand;
use Spatie\SimpleExcel\SimpleExcelReader;

final class PostUploadCsvTeamsController  extends ControllerCommand
{
    public function __invoke(): JsonResponse
    {
        $rows = SimpleExcelReader::create($this->move("teams"))->getRows();

        $rows->each(fn(array $row) => $this->bus->dispatch(
            new CreateTeamCommand(UuidValueObject::random()->value(), $row["name"], $row["flag"])
        ));

        return $this->json();
    }
}