<?php

namespace AdilaPay\Products\Types;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class CreateProductsRequestDefaultPriceDataRecurring extends JsonSerializableType
{
    /**
     * @var value-of<CreateProductsRequestDefaultPriceDataRecurringInterval> $interval
     */
    #[JsonProperty('interval')]
    public string $interval;

    /**
     * @var ?int $intervalCount
     */
    #[JsonProperty('interval_count')]
    public ?int $intervalCount;

    /**
     * @param array{
     *   interval: value-of<CreateProductsRequestDefaultPriceDataRecurringInterval>,
     *   intervalCount?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->interval = $values['interval'];
        $this->intervalCount = $values['intervalCount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
