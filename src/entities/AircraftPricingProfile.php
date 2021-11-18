<?php declare(strict_types=1);

namespace ddd\pricing\entities;

use ddd\pricing\values;

final class AircraftPricingProfile
{
    private values\AircraftPricingProfileID $id;
    private values\AircraftPricingProfileProperties $properties;

    /**
     * AircraftPricingProfile constructor.
     * @param values\AircraftPricingProfileID $id
     * @param values\AircraftPricingProfileProperties $properties
     */
    private function __construct(values\AircraftPricingProfileID $id, values\AircraftPricingProfileProperties $properties)
    {
        $this->id = $id;
        $this->properties = $properties;
    }

    /**
     * @param values\AircraftPricingProfileID $id
     * @param values\AircraftPricingProfileProperties $properties
     * @return AircraftPricingProfile
     */
    public static function load(values\AircraftPricingProfileID $id, values\AircraftPricingProfileProperties $properties)
    {
        return new self($id, $properties);
    }

    /**
     * @return values\AircraftPricingProfileID
     */
    public function getId(): values\AircraftPricingProfileID
    {
        return $this->id;
    }

    /**
     * @return values\AircraftPricingProfileProperties
     */
    public function getProperties(): values\AircraftPricingProfileProperties
    {
        return $this->properties;
    }
}