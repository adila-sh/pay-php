<?php

namespace AdilaPay\Subscriptions\Types;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class PreviewSubscriptionsResponse extends JsonSerializableType
{
    /**
     * @var int $amountDue
     */
    #[JsonProperty('amount_due')]
    public int $amountDue;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var int $prorationDate
     */
    #[JsonProperty('proration_date')]
    public int $prorationDate;

    /**
     * @var int $total
     */
    #[JsonProperty('total')]
    public int $total;

    /**
     * @param array{
     *   amountDue: int,
     *   currency: string,
     *   prorationDate: int,
     *   total: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->amountDue = $values['amountDue'];
        $this->currency = $values['currency'];
        $this->prorationDate = $values['prorationDate'];
        $this->total = $values['total'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
