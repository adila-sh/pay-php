<?php

namespace AdilaPay\Schedules\Types;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class PreviewSchedulesRequestPhasesItem extends JsonSerializableType
{
    /**
     * @var string $price
     */
    #[JsonProperty('price')]
    public string $price;

    /**
     * @var int $quantity
     */
    #[JsonProperty('quantity')]
    public int $quantity;

    /**
     * @var int $months
     */
    #[JsonProperty('months')]
    public int $months;

    /**
     * @param array{
     *   price: string,
     *   quantity: int,
     *   months: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->price = $values['price'];
        $this->quantity = $values['quantity'];
        $this->months = $values['months'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
