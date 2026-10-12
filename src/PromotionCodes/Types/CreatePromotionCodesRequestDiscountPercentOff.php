<?php

namespace AdilaPay\PromotionCodes\Types;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class CreatePromotionCodesRequestDiscountPercentOff extends JsonSerializableType
{
    /**
     * @var float $percentOff
     */
    #[JsonProperty('percent_off')]
    public float $percentOff;

    /**
     * @param array{
     *   percentOff: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->percentOff = $values['percentOff'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
