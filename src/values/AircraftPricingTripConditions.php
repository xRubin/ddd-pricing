<?php declare(strict_types=1);

namespace ddd\pricing\values;

final class AircraftPricingTripConditions
{
    private ?bool $oneway;

    public function __construct(?bool $oneway)
    {
        $this->oneway = $oneway;
    }

    /**
     * @return bool|null
     */
    public function getOneway(): ?bool
    {
        return $this->oneway;
    }

    /**
     * @param AircraftPricingTripConditions $conditions
     * @return bool
     */
    public function satisfiedBy(self $conditions): bool
    {
        if (is_null($conditions->getOneway()))
            return true;

        return $this->getOneway() === $conditions->getOneway();
    }
}