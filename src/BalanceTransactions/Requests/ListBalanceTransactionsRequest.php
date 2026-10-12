<?php

namespace AdilaPay\BalanceTransactions\Requests;

use AdilaPay\Core\Json\JsonSerializableType;

class ListBalanceTransactionsRequest extends JsonSerializableType
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
     * @var ?string $type
     */
    public ?string $type;

    /**
     * @var ?string $payout
     */
    public ?string $payout;

    /**
     * @var ?int $createdGte
     */
    public ?int $createdGte;

    /**
     * @var ?int $createdLte
     */
    public ?int $createdLte;

    /**
     * @param array{
     *   organizationId: string,
     *   limit?: ?int,
     *   startingAfter?: ?string,
     *   type?: ?string,
     *   payout?: ?string,
     *   createdGte?: ?int,
     *   createdLte?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->limit = $values['limit'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->payout = $values['payout'] ?? null;
        $this->createdGte = $values['createdGte'] ?? null;
        $this->createdLte = $values['createdLte'] ?? null;
    }
}
