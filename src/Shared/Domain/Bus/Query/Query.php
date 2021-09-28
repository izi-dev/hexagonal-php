<?php declare(strict_types=1);

namespace IziDev\Shared\Domain\Bus\Query;

interface Query
{
    public function queryName(): string;
}
