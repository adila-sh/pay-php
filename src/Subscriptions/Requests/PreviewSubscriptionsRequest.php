<?php

namespace AdilaPay\Subscriptions\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class PreviewSubscriptionsRequest extends JsonSerializableType
{
    /**
     * @var string $organizationId UUID da organização vinculada à API key ou à sessão autorizada.
     */
    public string $organizationId;

    /**
     * @var string $id
     */
    public string $id;

    /**
     * @var string $price
     */
    #[JsonProperty('price')]
    public string $price;

    /**
     * @param array{
     *   organizationId: string,
     *   id: string,
     *   price: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->id = $values['id'];
        $this->price = $values['price'];
    }
}
