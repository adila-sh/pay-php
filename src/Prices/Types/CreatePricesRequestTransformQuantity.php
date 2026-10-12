<?php

namespace AdilaPay\Prices\Types;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class CreatePricesRequestTransformQuantity extends JsonSerializableType
{
    /**
     * @var int $divideBy
     */
    #[JsonProperty('divide_by')]
    public int $divideBy;

    /**
     * @var value-of<CreatePricesRequestTransformQuantityRound> $round
     */
    #[JsonProperty('round')]
    public string $round;

    /**
     * @param array{
     *   divideBy: int,
     *   round: value-of<CreatePricesRequestTransformQuantityRound>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->divideBy = $values['divideBy'];
        $this->round = $values['round'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
