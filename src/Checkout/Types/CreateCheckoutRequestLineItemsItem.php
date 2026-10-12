<?php

namespace AdilaPay\Checkout\Types;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class CreateCheckoutRequestLineItemsItem extends JsonSerializableType
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
     * @param array{
     *   price: string,
     *   quantity: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->price = $values['price'];
        $this->quantity = $values['quantity'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
