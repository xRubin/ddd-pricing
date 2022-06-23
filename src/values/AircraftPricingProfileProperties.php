<?php declare(strict_types=1);

namespace ddd\pricing\values;

final class AircraftPricingProfileProperties
{
    private AircraftPricingProfileName $name;

    private int $urgent1 = 0;
    private int $urgent2 = 0;
    private int $urgent3 = 0;

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

    /**
     * @return int
     */
    public function getUrgent1(): int
    {
        return $this->urgent1;
    }

    /**
     * @param int $urgent1
     * @return AircraftPricingProfileProperties
     */
    public function setUrgent1(int $urgent1): AircraftPricingProfileProperties
    {
        $this->urgent1 = $urgent1;
        return $this;
    }

    /**
     * @return int
     */
    public function getUrgent2(): int
    {
        return $this->urgent2;
    }

    /**
     * @param int $urgent2
     * @return AircraftPricingProfileProperties
     */
    public function setUrgent2(int $urgent2): AircraftPricingProfileProperties
    {
        $this->urgent2 = $urgent2;
        return $this;
    }

    /**
     * @return int
     */
    public function getUrgent3(): int
    {
        return $this->urgent3;
    }

    /**
     * @param int $urgent3
     * @return AircraftPricingProfileProperties
     */
    public function setUrgent3(int $urgent3): AircraftPricingProfileProperties
    {
        $this->urgent3 = $urgent3;
        return $this;
    }
}