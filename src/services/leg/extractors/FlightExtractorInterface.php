<?php declare(strict_types=1);

namespace ddd\pricing\services\leg\extractors;

use ddd\aviation\aggregates\FlightDecomposition;

interface FlightExtractorInterface
{
    public function extractValue(FlightDecomposition $flight): float;
}