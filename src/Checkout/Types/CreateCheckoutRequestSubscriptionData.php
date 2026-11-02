<?php

namespace AdilaPay\Checkout\Types;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;
use AdilaPay\Core\Types\ArrayType;

class CreateCheckoutRequestSubscriptionData extends JsonSerializableType
{
    /**
     * @var ?int $trialPeriodDays
     */
    #[JsonProperty('trial_period_days')]
    public ?int $trialPeriodDays;

    /**
     * @var ?array<string, string> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'string'])]
    public ?array $metadata;

    /**
     * @param array{
     *   trialPeriodDays?: ?int,
     *   metadata?: ?array<string, string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->trialPeriodDays = $values['trialPeriodDays'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
