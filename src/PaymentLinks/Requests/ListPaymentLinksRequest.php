<?php

namespace AdilaPay\PaymentLinks\Requests;

use AdilaPay\Core\Json\JsonSerializableType;

class ListPaymentLinksRequest extends JsonSerializableType
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
     * @var ?bool $active
     */
    public ?bool $active;

    /**
     * @param array{
     *   organizationId: string,
     *   limit?: ?int,
     *   startingAfter?: ?string,
     *   active?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->limit = $values['limit'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
        $this->active = $values['active'] ?? null;
    }
}
