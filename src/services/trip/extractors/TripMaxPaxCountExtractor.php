<?php declare(strict_types=1);

namespace ddd\pricing\services\trip\extractors;

use ddd\aviation\aggregates\FlightDecomposition;
use ddd\aviation\aggregates\TripDecomposition;

final class TripMaxPaxCountExtractor implements TripExtractorInterface
{
    public function extractValue(TripDecomposition $trip): int
    {
        return array_reduce(
            $trip->getFlights(),
            fn(int $maxPax, FlightDecomposition $flight) => max($maxPax, $flight->getRoute()->getPax()->getValue()),
            1
        );
    }
}