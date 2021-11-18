<?php declare(strict_types=1);

namespace ddd\pricing\entities;

use ddd\pricing\values;

final class AircraftPricing
{
    private values\AircraftPricingID $id;
    private values\AircraftPricingProperties $properties;

    /**
     * AircraftPricing constructor.
     * @param values\AircraftPricingID $id
     * @param values\AircraftPricingProperties $properties
     */
    private function __construct(values\AircraftPricingID $id, values\AircraftPricingProperties $properties)
    {
        $this->id = $id;
        $this->properties = $properties;
    }

    /**
     * @param values\AircraftPricingID $id
     * @param values\AircraftPricingProperties $properties
     * @return AircraftPricing
     */
    public static function load(values\AircraftPricingID $id, values\AircraftPricingProperties $properties)
    {
        return new self($id, $properties);
    }

    /**
     * @return values\AircraftPricingID
     */
    public function getId(): values\AircraftPricingID
    {
        return $this->id;
    }

    /**
     * @return values\AircraftPricingProperties
     */
    public function getProperties(): values\AircraftPricingProperties
    {
        return $this->properties;
    }
}