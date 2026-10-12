<?php

namespace AdilaPay\Prices\Types;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;
use AdilaPay\Core\Types\Union;

class CreatePricesRequestTiersItem extends JsonSerializableType
{
    /**
     * @var (
     *    value-of<CreatePricesRequestTiersItemUpToZero>
     *   |int
     * ) $upTo
     */
    #[JsonProperty('up_to'), Union('string', 'integer')]
    public string|int $upTo;

    /**
     * @var ?int $unitAmount
     */
    #[JsonProperty('unit_amount')]
    public ?int $unitAmount;

    /**
     * @var ?int $flatAmount
     */
    #[JsonProperty('flat_amount')]
    public ?int $flatAmount;

    /**
     * @param array{
     *   upTo: (
     *    value-of<CreatePricesRequestTiersItemUpToZero>
     *   |int
     * ),
     *   unitAmount?: ?int,
     *   flatAmount?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->upTo = $values['upTo'];
        $this->unitAmount = $values['unitAmount'] ?? null;
        $this->flatAmount = $values['flatAmount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
