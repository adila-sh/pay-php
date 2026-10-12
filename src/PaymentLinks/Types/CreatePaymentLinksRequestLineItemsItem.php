<?php

namespace AdilaPay\PaymentLinks\Types;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class CreatePaymentLinksRequestLineItemsItem extends JsonSerializableType
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
     * @var ?CreatePaymentLinksRequestLineItemsItemAdjustableQuantity $adjustableQuantity
     */
    #[JsonProperty('adjustable_quantity')]
    public ?CreatePaymentLinksRequestLineItemsItemAdjustableQuantity $adjustableQuantity;

    /**
     * @param array{
     *   price: string,
     *   quantity: int,
     *   adjustableQuantity?: ?CreatePaymentLinksRequestLineItemsItemAdjustableQuantity,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->price = $values['price'];
        $this->quantity = $values['quantity'];
        $this->adjustableQuantity = $values['adjustableQuantity'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
