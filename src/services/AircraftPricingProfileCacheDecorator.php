<?php declare(strict_types=1);

namespace ddd\pricing\services;

use ddd\pricing\interfaces\AircraftPricingProfileProxyServiceInterface;
use ddd\pricing\entities\AircraftPricingCalculator;
use ddd\pricing\entities\AircraftPricingProfile;
use ddd\pricing\values\AircraftPricingCalculatorProperties;
use ddd\pricing\values\AircraftPricingProfileID;
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
            __METHOD__ . ':' . ($name ? ':' . $name->getValue() : ''),
            fn() => $this->service->getAvailableProfileNames($name),
            10
        );
    }

    public function getCalculatorsByProfilesIds(array $ids = []): array
    {
        if (empty($ids))
            return [];

        return \Yii::$app->cache->getOrSet(
            __METHOD__ . ':' . implode(',', $ids),
            fn() => $this->service->getCalculatorsByProfilesIds($ids),
            10
        );
    }

    /**
     * @param AircraftPricingProfileID $id
     * @return AircraftPricingProfile
     */
    public function getProfile(AircraftPricingProfileID $id): AircraftPricingProfile
    {
        return \Yii::$app->cache->getOrSet(
            __METHOD__ . ':' . $id->getValue(),
            fn() => $this->service->getProfile($id),
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