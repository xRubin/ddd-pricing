<?php declare(strict_types=1);

namespace ddd\pricing\values;

use unapi\helper\money\MoneyAmount;

final class AircraftPricingCalculatorProperties
{
    private AircraftPricingCalculatorType $type;
    private AircraftPricingCalculatorName $name;
    private array $conditions;
    private array $filters;
    private AircraftPricingCalculatorUnit $unit;
    private AircraftPricingCalculatorTax $tax;
    private AircraftPricingCalculatorRound $round;
    private MoneyAmount $price;

    private ?AircraftPricingID $aircraftPricingId = null;

    public function __construct(AircraftPricingCalculatorType $type, AircraftPricingCalculatorName $name, array $conditions, array $filters, AircraftPricingCalculatorUnit $unit, AircraftPricingCalculatorTax $tax, AircraftPricingCalculatorRound $round, MoneyAmount $price)
    {
        $this->type = $type;
        $this->name = $name;
        $this->conditions = $conditions;
        $this->filters = $filters;
        $this->unit = $unit;
        $this->tax = $tax;
        $this->round = $round;
        $this->price = $price;
    }

    /**
     * @return AircraftPricingCalculatorType
     */
    public function getType(): AircraftPricingCalculatorType
    {
        return $this->type;
    }

    /**
     * @return AircraftPricingCalculatorName
     */
    public function getName(): AircraftPricingCalculatorName
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getConditions(): array
    {
        return $this->conditions;
    }

    /**
     * @return array
     */
    public function getFilters(): array
    {
        return $this->filters;
    }

    /**
     * @return AircraftPricingCalculatorUnit
     */
    public function getUnit(): AircraftPricingCalculatorUnit
    {
        return $this->unit;
    }

    /**
     * @return AircraftPricingCalculatorTax
     */
    public function getTax(): AircraftPricingCalculatorTax
    {
        return $this->tax;
    }

    /**
     * @return AircraftPricingCalculatorRound
     */
    public function getRound(): AircraftPricingCalculatorRound
    {
        return $this->round;
    }

    /**
     * @return MoneyAmount
     */
    public function getPrice(): MoneyAmount
    {
        return $this->price;
    }

    /**
     * @return AircraftPricingID|null
     */
    public function getAircraftPricingId(): ?AircraftPricingID
    {
        return $this->aircraftPricingId;
    }

    /**
     * @param AircraftPricingID|null $aircraftPricingId
     */
    public function setAircraftPricingId(?AircraftPricingID $aircraftPricingId): void
    {
        $this->aircraftPricingId = $aircraftPricingId;
    }
}