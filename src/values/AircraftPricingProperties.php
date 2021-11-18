<?php declare(strict_types=1);

namespace ddd\pricing\values;

final class AircraftPricingProperties
{
    private $aircraftId;
    private AircraftPricingProfileID $pricingProfileId;
    private AircraftPricingTripConditions $conditions;

    private ?\DateTimeInterface $validFrom = null;
    private ?\DateTimeInterface $validTo = null;

    public function __construct($aircraftId, AircraftPricingProfileID $pricingProfileId, AircraftPricingTripConditions $conditions)
    {
        $this->aircraftId = $aircraftId;
        $this->pricingProfileId = $pricingProfileId;
        $this->conditions = $conditions;
    }

    /**
     * @param \DateTimeInterface|null $validFrom
     * @return AircraftPricingProperties
     */
    public function setValidFrom(?\DateTimeInterface $validFrom): AircraftPricingProperties
    {
        $this->validFrom = $validFrom;
        return $this;
    }

    /**
     * @param \DateTimeInterface|null $validTo
     * @return AircraftPricingProperties
     */
    public function setValidTo(?\DateTimeInterface $validTo): AircraftPricingProperties
    {
        $this->validTo = $validTo;
        return $this;
    }

    public function getAircraftId()
    {
        return $this->aircraftId;
    }

    /**
     * @return AircraftPricingProfileID
     */
    public function getPricingProfileId(): AircraftPricingProfileID
    {
        return $this->pricingProfileId;
    }

    /**
     * @return AircraftPricingTripConditions
     */
    public function getConditions(): AircraftPricingTripConditions
    {
        return $this->conditions;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getValidFrom(): ?\DateTimeInterface
    {
        return $this->validFrom;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getValidTo(): ?\DateTimeInterface
    {
        return $this->validTo;
    }
}