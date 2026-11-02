<?php

namespace AdilaPay\Checkout\Types;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class CreateCheckoutRequestCustomerUpdate extends JsonSerializableType
{
    /**
     * @var ?value-of<CreateCheckoutRequestCustomerUpdateName> $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<CreateCheckoutRequestCustomerUpdateAddress> $address
     */
    #[JsonProperty('address')]
    public ?string $address;

    /**
     * @param array{
     *   name?: ?value-of<CreateCheckoutRequestCustomerUpdateName>,
     *   address?: ?value-of<CreateCheckoutRequestCustomerUpdateAddress>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->address = $values['address'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
