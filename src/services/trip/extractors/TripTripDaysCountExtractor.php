<?php declare(strict_types=1);

namespace ddd\pricing\services\trip\extractors;

use ddd\aviation\aggregates\TripDecomposition;
use ddd\aviation\aggregates\FlightDecomposition;

final class TripTripDaysCountExtractor implements TripExtractorInterface
{
    public function extractValue(TripDecomposition $trip): int
    {
        return (int)floor(array_reduce(
            $trip->getFlights(),
            fn(float $carry, FlightDecomposition $flight) => $carry
                + $flight->getRoute()->getTotalTime()->inHours()
                + $flight->getParkingInterval()->inHours(),
            0.0
        ) / 24);
    }
}