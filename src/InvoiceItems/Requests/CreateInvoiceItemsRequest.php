<?php

namespace AdilaPay\InvoiceItems\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;
use AdilaPay\Core\Types\ArrayType;

class CreateInvoiceItemsRequest extends JsonSerializableType
{
    /**
     * @var string $organizationId UUID da organização vinculada à API key ou à sessão autorizada.
     */
    public string $organizationId;

    /**
     * @var string $idempotencyKey Chave estável da operação lógica. Reutilize apenas com os mesmos parâmetros em retries.
     */
    public string $idempotencyKey;

    /**
     * @var string $customer
     */
    #[JsonProperty('customer')]
    public string $customer;

    /**
     * @var string $subscription
     */
    #[JsonProperty('subscription')]
    public string $subscription;

    /**
     * @var int $amount
     */
    #[JsonProperty('amount')]
    public int $amount;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var string $description
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var ?array<string, string> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'string'])]
    public ?array $metadata;

    /**
     * @param array{
     *   organizationId: string,
     *   idempotencyKey: string,
     *   customer: string,
     *   subscription: string,
     *   amount: int,
     *   currency: string,
     *   description: string,
     *   metadata?: ?array<string, string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->customer = $values['customer'];
        $this->subscription = $values['subscription'];
        $this->amount = $values['amount'];
        $this->currency = $values['currency'];
        $this->description = $values['description'];
        $this->metadata = $values['metadata'] ?? null;
    }
}
