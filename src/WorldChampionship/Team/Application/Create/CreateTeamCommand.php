<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Team\Application\Create;

use IziDev\Shared\Domain\Bus\Command\Command;

final class CreateTeamCommand implements Command
{
    public function __construct(
        private string $id,
        private string $name,
        private string $flagUrl
    )
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function flagUrl(): string
    {
        return $this->flagUrl;
    }

    public function commandName(): string
    {
        return "world.championship.team.create";
    }
}