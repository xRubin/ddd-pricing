<?php declare(strict_types=1);

namespace ddd\pricing\services\leg\extractors;

use ddd\aviation\aggregates\FlightDecomposition;

final class FlightTotalTimeExtractor implements FlightExtractorInterface
{
    public function extractValue(FlightDecomposition $flight): float
    {
        return $flight->getRoute()->getTotalTime()->inHours();
    }
}