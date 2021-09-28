<?php declare(strict_types=1);

namespace IziDev\Shared\Domain\ValueObject;

abstract class StringValueObject
{
    public function __construct(protected string $value)
    {
    }

    public static function fromValue(string $value)
    {
        return new static($value);
    }

    public function value(): string
    {
        return $this->value;
    }
}
