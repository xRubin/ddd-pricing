<?php declare(strict_types=1);

namespace ddd\pricing\services\leg\extractors;

use ddd\aviation\aggregates\FlightDecomposition;

final class FlightLuggageExtractor implements FlightExtractorInterface
{
    public function extractValue(FlightDecomposition $flight): float
    {
        return $flight->getRoute()->getLuggage()->getValue();
    }
}