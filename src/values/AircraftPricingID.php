<?php declare(strict_types=1);

namespace ddd\pricing\values;

use ddd\domain\values\AbstractDomainValue;

final class AircraftPricingID extends AbstractDomainValue
{
    private int $value;

    /**
     * AircraftPricingID constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}