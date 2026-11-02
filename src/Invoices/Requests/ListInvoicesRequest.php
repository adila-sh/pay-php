<?php

namespace AdilaPay\Invoices\Requests;

use AdilaPay\Core\Json\JsonSerializableType;

class ListInvoicesRequest extends JsonSerializableType
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
     * @var ?string $customer
     */
    public ?string $customer;

    /**
     * @var ?string $subscription
     */
    public ?string $subscription;

    /**
     * @param array{
     *   organizationId: string,
     *   limit?: ?int,
     *   startingAfter?: ?string,
     *   customer?: ?string,
     *   subscription?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->limit = $values['limit'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
        $this->customer = $values['customer'] ?? null;
        $this->subscription = $values['subscription'] ?? null;
    }
}
