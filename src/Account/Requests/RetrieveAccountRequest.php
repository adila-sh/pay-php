<?php

namespace AdilaPay\Account\Requests;

use AdilaPay\Core\Json\JsonSerializableType;

class RetrieveAccountRequest extends JsonSerializableType
{
    /**
     * @var string $organizationId UUID da organização vinculada à API key ou à sessão autorizada.
     */
    public string $organizationId;

    /**
     * @param array{
     *   organizationId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
    }
}
