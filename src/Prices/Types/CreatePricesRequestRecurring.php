<?php

namespace AdilaPay\Prices\Types;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class CreatePricesRequestRecurring extends JsonSerializableType
{
    /**
     * @var value-of<CreatePricesRequestRecurringInterval> $interval
     */
    #[JsonProperty('interval')]
    public string $interval;

    /**
     * @var ?int $intervalCount
     */
    #[JsonProperty('interval_count')]
    public ?int $intervalCount;

    /**
     * @var ?int $trialPeriodDays
     */
    #[JsonProperty('trial_period_days')]
    public ?int $trialPeriodDays;

    /**
     * @param array{
     *   interval: value-of<CreatePricesRequestRecurringInterval>,
     *   intervalCount?: ?int,
     *   trialPeriodDays?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->interval = $values['interval'];
        $this->intervalCount = $values['intervalCount'] ?? null;
        $this->trialPeriodDays = $values['trialPeriodDays'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
