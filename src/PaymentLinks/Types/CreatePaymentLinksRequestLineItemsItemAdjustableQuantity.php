<?php

namespace AdilaPay\PaymentLinks\Types;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class CreatePaymentLinksRequestLineItemsItemAdjustableQuantity extends JsonSerializableType
{
    /**
     * @var bool $enabled
     */
    #[JsonProperty('enabled')]
    public bool $enabled;

    /**
     * @var ?int $minimum
     */
    #[JsonProperty('minimum')]
    public ?int $minimum;

    /**
     * @var ?int $maximum
     */
    #[JsonProperty('maximum')]
    public ?int $maximum;

    /**
     * @param array{
     *   enabled: bool,
     *   minimum?: ?int,
     *   maximum?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->enabled = $values['enabled'];
        $this->minimum = $values['minimum'] ?? null;
        $this->maximum = $values['maximum'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
