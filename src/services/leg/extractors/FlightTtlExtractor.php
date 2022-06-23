<?php declare(strict_types=1);

namespace ddd\pricing\services\leg\extractors;

use ddd\aviation\aggregates\FlightDecomposition;

final class FlightTtlExtractor implements FlightExtractorInterface
{
    public function extractValue(FlightDecomposition $flight): float
    {
        $timeLeft =  time() - $flight->getDepartureDate()->getTimestamp();
        return $timeLeft <= 0 ? 0 : $timeLeft / 3600;
    }
}