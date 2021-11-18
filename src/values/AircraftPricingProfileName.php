<?php declare(strict_types=1);

namespace ddd\pricing\values;

use ddd\domain\values\AbstractDomainValue;

final class AircraftPricingProfileName extends AbstractDomainValue
{
    private string $value;

    /**
     * AircraftPricingProfileName constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}