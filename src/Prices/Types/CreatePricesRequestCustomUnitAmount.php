<?php

namespace AdilaPay\Prices\Types;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class CreatePricesRequestCustomUnitAmount extends JsonSerializableType
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
     * @var ?int $preset
     */
    #[JsonProperty('preset')]
    public ?int $preset;

    /**
     * @param array{
     *   enabled: bool,
     *   minimum?: ?int,
     *   maximum?: ?int,
     *   preset?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->enabled = $values['enabled'];
        $this->minimum = $values['minimum'] ?? null;
        $this->maximum = $values['maximum'] ?? null;
        $this->preset = $values['preset'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
