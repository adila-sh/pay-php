<?php

namespace AdilaPay\Checkout\Types;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class CreateCheckoutRequestTaxIdCollection extends JsonSerializableType
{
    /**
     * @var bool $enabled
     */
    #[JsonProperty('enabled')]
    public bool $enabled;

    /**
     * @param array{
     *   enabled: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->enabled = $values['enabled'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
