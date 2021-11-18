<?php declare(strict_types=1);

namespace ddd\pricing\services\trip\extractors;

use ddd\aviation\aggregates\FlightDecomposition;
use ddd\aviation\aggregates\TripDecomposition;

final class TripFlightDaysCountExtractor implements TripExtractorInterface
{
    public function extractValue(TripDecomposition $trip): int
    {
        return (int)ceil(array_reduce(
                $trip->getFlights(),
                fn(float $carry, FlightDecomposition $flight) => $carry
                    + $flight->getRoute()->getTotalTime()->inHours()
                    + $flight->getParkingInterval()->inHours(),
                0.0
            ) / 10);
    }
}