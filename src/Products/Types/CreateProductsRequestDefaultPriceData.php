<?php

namespace AdilaPay\Products\Types;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class CreateProductsRequestDefaultPriceData extends JsonSerializableType
{
    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var int $unitAmount
     */
    #[JsonProperty('unit_amount')]
    public int $unitAmount;

    /**
     * @var ?CreateProductsRequestDefaultPriceDataRecurring $recurring
     */
    #[JsonProperty('recurring')]
    public ?CreateProductsRequestDefaultPriceDataRecurring $recurring;

    /**
     * @param array{
     *   currency: string,
     *   unitAmount: int,
     *   recurring?: ?CreateProductsRequestDefaultPriceDataRecurring,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->currency = $values['currency'];
        $this->unitAmount = $values['unitAmount'];
        $this->recurring = $values['recurring'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
