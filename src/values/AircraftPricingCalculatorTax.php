<?php declare(strict_types=1);

namespace ddd\pricing\values;

use rubin\structures\enum\Enum;

final class AircraftPricingCalculatorTax extends Enum
{
    const NONE = 'none';
    const IS_TAXABLE = 'is_taxable';
    const IS_TAX = 'is_tax';
}