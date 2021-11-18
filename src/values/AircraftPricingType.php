<?php declare(strict_types=1);

namespace ddd\pricing\values;

use rubin\structures\enum\Enum;

final class AircraftPricingType extends Enum
{
    const PRIMARY = 0;
    const SEASONAL = 1;
}