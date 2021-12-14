<?php declare(strict_types=1);

namespace ddd\pricing\exceptions;

use ddd\pricing\interfaces\AircraftPricingProfileExceptionInterface;
use ddd\domain\exceptions\DomainServiceExceptionInterface;

final class AircraftPricingProfileSavingException extends \RuntimeException implements AircraftPricingProfileExceptionInterface, DomainServiceExceptionInterface
{
    public $message = 'AIRCRAFT_PRICING_PROFILE_SAVING_ERROR';
}