<?php declare(strict_types=1);

namespace IziDev\Shared\Domain;

abstract class Collection implements CollectionInterface
{
    public function __construct(protected array $items = [])
    {
    }

    public function all(): array
    {
        return $this->items;
    }
}
