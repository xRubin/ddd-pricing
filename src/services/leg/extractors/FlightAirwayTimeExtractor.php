<?php declare(strict_types=1);

namespace ddd\pricing\services\leg\extractors;

use ddd\aviation\aggregates\FlightDecomposition;

final class FlightAirwayTimeExtractor implements FlightExtractorInterface
{
    public function extractValue(FlightDecomposition $flight): float
    {
        return $flight->getRoute()->getAirwayTime()->inHours();
    }
}