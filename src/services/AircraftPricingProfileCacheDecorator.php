<?php declare(strict_types=1);

namespace ddd\pricing\services;

use ddd\pricing\interfaces\AircraftPricingProfileProxyServiceInterface;
use ddd\pricing\entities\AircraftPricingCalculator;
use ddd\pricing\entities\AircraftPricingProfile;
use ddd\pricing\values\AircraftPricingCalculatorProperties;
use ddd\pricing\values\AircraftPricingProfileName;
use ddd\pricing\values\AircraftPricingProfileProperties;

final class AircraftPricingProfileCacheDecorator implements AircraftPricingProfileProxyServiceInterface
{
    private AircraftPricingProfileProxyServiceInterface $service;

    public function __construct(AircraftPricingProfileProxyServiceInterface $service)
    {
        $this->service = $service;
    }

    public function getAvailableProfileNames(?AircraftPricingProfileName $name = null): array
    {
        return \Yii::$app->cache->getOrSet(
            __CLASS__ . ':' . __METHOD__ . ':' . ($name ? ':' . $name->getValue() : ''),
            fn() => $this->service->getAvailableProfileNames($name),
            10
        );
    }

    public function getCalculatorsByProfilesIds(array $ids = []): array
    {
        if (empty($ids))
            return [];

        return \Yii::$app->cache->getOrSet(
            __CLASS__ . ':' . __METHOD__ . ':' . implode(',', $ids),
            fn() => $this->service->getCalculatorsByProfilesIds($ids),
            10
        );
    }

    public function createProfile(AircraftPricingProfileProperties $properties): AircraftPricingProfile
    {
        return $this->service->createProfile($properties);
    }

    public function createProfileCalculator(AircraftPricingCalculatorProperties $properties): AircraftPricingCalculator
    {
        return $this->service->createProfileCalculator($properties);
    }
}