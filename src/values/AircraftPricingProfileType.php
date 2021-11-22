<?php declare(strict_types=1);

namespace ddd\pricing\values;

use rubin\structures\enum\Enum;

final class AircraftPricingProfileType extends Enum
{
    public const COMMON = 1;
    public const PRIVATE = 2;
}