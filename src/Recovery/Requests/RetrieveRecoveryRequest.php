<?php

namespace AdilaPay\Recovery\Requests;

use AdilaPay\Core\Json\JsonSerializableType;

class RetrieveRecoveryRequest extends JsonSerializableType
{
    /**
     * @var string $organizationId UUID da organização vinculada à API key ou à sessão autorizada.
     */
    public string $organizationId;

    /**
     * @var ?string $startingAfter
     */
    public ?string $startingAfter;

    /**
     * @param array{
     *   organizationId: string,
     *   startingAfter?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->startingAfter = $values['startingAfter'] ?? null;
    }
}
