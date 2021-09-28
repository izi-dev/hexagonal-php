<?php declare(strict_types=1);

namespace IziDev\WorldChampionship\Infraction\Application;

use IziDev\Shared\Domain\Bus\Query\Response;
use IziDev\WorldChampionship\Infraction\Domain\Infraction;
use IziDev\WorldChampionship\Infraction\Domain\Infractions;

final class InfractionsResponse implements Response
{
    public function __construct(private array $infractions)
    {
    }

    public static function fromInfractions(Infractions $infractions): self
    {
        $responses = array_map(
            fn(Infraction $infraction) => InfractionResponse::fromInfraction($infraction),
            $infractions->all()
        );

        return new self($responses);
    }

    public function toArray(): array
    {
        return array_map(fn(InfractionResponse $response) => $response->toArray(), $this->infractions);
    }
}