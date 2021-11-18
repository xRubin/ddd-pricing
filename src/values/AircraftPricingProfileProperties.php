<?php declare(strict_types=1);

namespace ddd\pricing\values;

final class AircraftPricingProfileProperties
{
    private AircraftPricingProfileName $name;

    public function __construct(AircraftPricingProfileName $name)
    {
        $this->name = $name;
    }

    /**
     * @return AircraftPricingProfileName
     */
    public function getName(): AircraftPricingProfileName
    {
        return $this->name;
    }
}