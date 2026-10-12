<?php

namespace AdilaPay\Customers\Requests;

use AdilaPay\Core\Json\JsonSerializableType;

class RetrieveCustomersRequest extends JsonSerializableType
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
     * @param array{
     *   organizationId: string,
     *   id: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->id = $values['id'];
    }
}
