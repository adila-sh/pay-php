<?php

namespace AdilaPay\PromotionCodes\Types;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class CreatePromotionCodesRequestDiscountAmountOff extends JsonSerializableType
{
    /**
     * @var int $amountOff
     */
    #[JsonProperty('amount_off')]
    public int $amountOff;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @param array{
     *   amountOff: int,
     *   currency: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->amountOff = $values['amountOff'];
        $this->currency = $values['currency'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
