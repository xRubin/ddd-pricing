<?php declare(strict_types=1);

namespace ddd\pricing\values;

use rubin\structures\enum\Enum;

final class AircraftPricingCalculatorType extends Enum
{
    const LEG = 0;
    const TRIP = 1;
    const TAX = 2;
}