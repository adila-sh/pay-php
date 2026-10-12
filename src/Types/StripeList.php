<?php

namespace AdilaPay\Types;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;
use AdilaPay\Core\Types\ArrayType;

class StripeList extends JsonSerializableType
{
    /**
     * @var array<array<string, mixed>> $data
     */
    #[JsonProperty('data'), ArrayType([['string' => 'mixed']])]
    public array $data;

    /**
     * @var bool $hasMore
     */
    #[JsonProperty('has_more')]
    public bool $hasMore;

    /**
     * @param array{
     *   data: array<array<string, mixed>>,
     *   hasMore: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
        $this->hasMore = $values['hasMore'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
