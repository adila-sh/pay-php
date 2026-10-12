<?php

namespace AdilaPay\Customers\Requests;

use AdilaPay\Core\Json\JsonSerializableType;

class ListCustomersRequest extends JsonSerializableType
{
    /**
     * @var string $organizationId UUID da organização vinculada à API key ou à sessão autorizada.
     */
    public string $organizationId;

    /**
     * @var ?int $limit
     */
    public ?int $limit;

    /**
     * @var ?string $startingAfter
     */
    public ?string $startingAfter;

    /**
     * @param array{
     *   organizationId: string,
     *   limit?: ?int,
     *   startingAfter?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->limit = $values['limit'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
    }
}
