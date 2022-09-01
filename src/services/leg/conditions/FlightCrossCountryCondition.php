<?php declare(strict_types=1);

namespace ddd\pricing\services\leg\conditions;

use ddd\aviation\aggregates\FlightDecomposition;

final class FlightCrossCountryCondition implements FlightConditionInterface
{
    public function isSatisfiedBy($value, FlightDecomposition $flight): bool
    {
        return in_array($value, $flight->getRoute()->getCountriesOnTheWay());
    }
}