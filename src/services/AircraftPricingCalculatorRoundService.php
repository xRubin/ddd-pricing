<?php declare(strict_types=1);

namespace ddd\pricing\services;

use ddd\pricing\values\AircraftPricingCalculatorRound;

final class AircraftPricingCalculatorRoundService
{
    public function applyRoundMethod(float $value, string $method): float
    {
        switch ($method) {
            case AircraftPricingCalculatorRound::UP:
                return ceil($value);
            case AircraftPricingCalculatorRound::DOWN:
                return floor($value);
            case AircraftPricingCalculatorRound::MATH:
                return round($value);
        }

        return $value;
    }
}