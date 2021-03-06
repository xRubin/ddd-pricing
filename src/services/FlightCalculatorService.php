<?php declare(strict_types=1);

namespace ddd\pricing\services;

use ddd\aviation\aggregates\FlightDecomposition;
use ddd\pricing\entities\AircraftPricingCalculator;
use ddd\pricing\services\leg;
use unapi\helper\money\Currency;
use unapi\helper\money\MoneyAmount;

final class FlightCalculatorService
{
    private leg\FlightConditionsChecker $conditionsChecker;
    private leg\FlightFiltersChecker $filtersChecker;
    private leg\FlightUnitExtractor $unitExtractor;
    private AircraftPricingCalculatorRoundService $roundService;

    public function __construct(
        leg\FlightConditionsChecker           $flightConditionsChecker,
        leg\FlightFiltersChecker              $flightFiltersChecker,
        leg\FlightUnitExtractor               $flightUnitExtractor,
        AircraftPricingCalculatorRoundService $roundService
    )
    {
        $this->conditionsChecker = $flightConditionsChecker;
        $this->filtersChecker = $flightFiltersChecker;
        $this->unitExtractor = $flightUnitExtractor;
        $this->roundService = $roundService;
    }

    public function calculatePrice(FlightDecomposition $flight, AircraftPricingCalculator $calculator): ?MoneyAmount
    {
        if (!$this->conditionsChecker->checkCalculatorConditions($flight, $calculator))
            return null;
        if (!$this->checkCalculatorFilters($flight, $calculator))
            return null;

        $price = $this->extractPrice($flight, $calculator) * $this->roundService->applyRoundMethod(
                $this->unitExtractor->extractUnit($flight, $calculator->getProperties()->getUnit()->getValue()),
                $calculator->getProperties()->getRound()->getValue()
            );

        return new MoneyAmount($price, new Currency(Currency::EUR));
    }

    private function checkCalculatorFilters(FlightDecomposition $flight, AircraftPricingCalculator $calculator): bool
    {
        foreach ($calculator->getProperties()->getFilters() as $filter) {
            $value = $this->unitExtractor->extractUnit($flight, $filter['unit']);

            if (!$this->filtersChecker->checkCalculatorFilters($value, $filter))
                return false;
        }
        return true;
    }

    private function extractPrice(FlightDecomposition $flight, AircraftPricingCalculator $calculator): float
    {
        return $calculator->getProperties()->getPrice()->getAmount();
    }
}