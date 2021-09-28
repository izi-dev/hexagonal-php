<?php declare(strict_types=1);

namespace IziDev\Shared\Domain\ValueObject;

abstract class IntValueObject
{
    public function __construct(protected int $value)
    {

    }

    public static function fromValue(int $value)
    {
        return new static($value);
    }

    public function value(): int
    {
        return $this->value;
    }
}