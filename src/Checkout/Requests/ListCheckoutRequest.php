<?php

namespace AdilaPay\Checkout\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Checkout\Types\ListCheckoutRequestStatus;

class ListCheckoutRequest extends JsonSerializableType
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
     * @var string $customer
     */
    public string $customer;

    /**
     * @var ?value-of<ListCheckoutRequestStatus> $status
     */
    public ?string $status;

    /**
     * @param array{
     *   organizationId: string,
     *   customer: string,
     *   limit?: ?int,
     *   startingAfter?: ?string,
     *   status?: ?value-of<ListCheckoutRequestStatus>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->limit = $values['limit'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
        $this->customer = $values['customer'];
        $this->status = $values['status'] ?? null;
    }
}
