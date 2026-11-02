<?php

namespace AdilaPay\UsageStatement\Requests;

use AdilaPay\Core\Json\JsonSerializableType;

class RetrieveUsageStatementRequest extends JsonSerializableType
{
    /**
     * @var string $organizationId UUID da organização vinculada à API key ou à sessão autorizada.
     */
    public string $organizationId;

    /**
     * @var string $meter
     */
    public string $meter;

    /**
     * @var string $customer
     */
    public string $customer;

    /**
     * @var ?string $startingAfter
     */
    public ?string $startingAfter;

    /**
     * @var int $startTime
     */
    public int $startTime;

    /**
     * @var int $endTime
     */
    public int $endTime;

    /**
     * @param array{
     *   organizationId: string,
     *   meter: string,
     *   customer: string,
     *   startTime: int,
     *   endTime: int,
     *   startingAfter?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->meter = $values['meter'];
        $this->customer = $values['customer'];
        $this->startingAfter = $values['startingAfter'] ?? null;
        $this->startTime = $values['startTime'];
        $this->endTime = $values['endTime'];
    }
}
