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
     * @var ?value-of<CreatePricesRequestRecurringUsageType> $usageType
     */
    #[JsonProperty('usage_type')]
    public ?string $usageType;

    /**
     * @var ?string $meter
     */
    #[JsonProperty('meter')]
    public ?string $meter;

    /**
     * @var ?int $trialPeriodDays
     */
    #[JsonProperty('trial_period_days')]
    public ?int $trialPeriodDays;

    /**
     * @param array{
     *   interval: value-of<CreatePricesRequestRecurringInterval>,
     *   intervalCount?: ?int,
     *   usageType?: ?value-of<CreatePricesRequestRecurringUsageType>,
     *   meter?: ?string,
     *   trialPeriodDays?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->interval = $values['interval'];
        $this->intervalCount = $values['intervalCount'] ?? null;
        $this->usageType = $values['usageType'] ?? null;
        $this->meter = $values['meter'] ?? null;
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
