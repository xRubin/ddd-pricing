<?php declare(strict_types=1);

namespace ddd\pricing\interfaces;

use ddd\pricing\entities\AircraftPricingCalculator;
use ddd\pricing\entities\AircraftPricingProfile;
use ddd\pricing\values\AircraftPricingCalculatorProperties;
use ddd\pricing\values\AircraftPricingProfileName;
use ddd\pricing\values\AircraftPricingProfileProperties;

interface AircraftPricingProfileProxyServiceInterface
{
    /**
     * @param AircraftPricingProfileName|null $name
     * @return string[]
     */
    public function getAvailableProfileNames(?AircraftPricingProfileName $name = null): array;

    /**
     * @param string[] $ids
     * @return AircraftPricingCalculator[]
     */
    public function getCalculatorsByProfilesIds(array $ids = []): array;

    /**
     * @param AircraftPricingProfileProperties $properties
     * @return AircraftPricingProfile
     */
    public function createProfile(AircraftPricingProfileProperties $properties): AircraftPricingProfile;

    /**
     * @param AircraftPricingCalculatorProperties $properties
     * @return AircraftPricingCalculator
     */
    public function createProfileCalculator(AircraftPricingCalculatorProperties $properties): AircraftPricingCalculator;
}