<?php declare(strict_types=1);

namespace IziDev\Shared\Domain\Bus\Command;

interface Command
{
    public function commandName(): string;
}
