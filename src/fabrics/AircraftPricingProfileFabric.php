<?php declare(strict_types=1);

namespace ddd\pricing\fabrics;

use ddd\pricing\entities;
use ddd\pricing\values;
use yii\helpers\ArrayHelper;

final class AircraftPricingProfileFabric
{
    /**
     * @param array $data
     * @return entities\AircraftPricingProfile[]
     */
    public function fromArray(array $data): array
    {
        return array_map(
            fn($item) => $this->fromData($item),
            $data
        );
    }

    /**
     * @param mixed $data
     * @return entities\AircraftPricingProfile
     */
    public function fromData($data): entities\AircraftPricingProfile
    {
        return entities\AircraftPricingProfile::load(
            new values\AircraftPricingProfileID($data->id),
            (new values\AircraftPricingProfileProperties(
                new values\AircraftPricingProfileName($data->name)
            ))
                ->setUrgent1(ArrayHelper::getValue($data, 'settings.urgent1', 0))
                ->setUrgent2(ArrayHelper::getValue($data, 'settings.urgent2', 0))
                ->setUrgent3(ArrayHelper::getValue($data, 'settings.urgent3', 0))
        );
    }
}