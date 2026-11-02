<?php

namespace AdilaPay\Subscriptions\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Subscriptions\Types\ListSubscriptionsRequestStatus;

class ListSubscriptionsRequest extends JsonSerializableType
{
    /**
     * @var string $organizationId UUID da organização vinculada à API key ou à sessão autorizada.
     */
    public string $organizationId;

    /**
     * @var ?string $customer
     */
    public ?string $customer;

    /**
     * @var ?int $limit
     */
    public ?int $limit;

    /**
     * @var ?string $startingAfter
     */
    public ?string $startingAfter;

    /**
     * @var ?value-of<ListSubscriptionsRequestStatus> $status
     */
    public ?string $status;

    /**
     * @param array{
     *   organizationId: string,
     *   customer?: ?string,
     *   limit?: ?int,
     *   startingAfter?: ?string,
     *   status?: ?value-of<ListSubscriptionsRequestStatus>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->customer = $values['customer'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
        $this->status = $values['status'] ?? null;
    }
}
