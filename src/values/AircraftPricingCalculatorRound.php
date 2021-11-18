<?php declare(strict_types=1);

namespace ddd\pricing\values;

use rubin\structures\enum\Enum;

final class AircraftPricingCalculatorRound extends Enum
{
    const NONE = 'none';
    const DOWN = 'down';
    const UP = 'up';
    const MATH = 'math';
}