<?php declare(strict_types=1);

namespace ddd\pricing\exceptions;

use ddd\domain\exceptions\InvalidValueExceptionInterface;

final class AircraftPricingValidationException extends \RuntimeException implements InvalidValueExceptionInterface
{
    public $message = 'AIRCRAFT_PRICING_VALIDATION_ERROR';
}