<?php

namespace AdilaPay\Prices\Types;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class CreatePricesRequestProductData extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $unitLabel
     */
    #[JsonProperty('unit_label')]
    public ?string $unitLabel;

    /**
     * @param array{
     *   name: string,
     *   unitLabel?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->unitLabel = $values['unitLabel'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
