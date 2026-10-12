<?php

namespace AdilaPay\PaymentIntents\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;
use AdilaPay\Core\Types\ArrayType;

class CreatePaymentIntentsRequest extends JsonSerializableType
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
     * @var ?string $customer
     */
    #[JsonProperty('customer')]
    public ?string $customer;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $receiptEmail
     */
    #[JsonProperty('receipt_email')]
    public ?string $receiptEmail;

    /**
     * @var ?array<string, string> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'string'])]
    public ?array $metadata;

    /**
     * @param array{
     *   organizationId: string,
     *   idempotencyKey: string,
     *   amount: int,
     *   currency: string,
     *   customer?: ?string,
     *   description?: ?string,
     *   receiptEmail?: ?string,
     *   metadata?: ?array<string, string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->amount = $values['amount'];
        $this->currency = $values['currency'];
        $this->customer = $values['customer'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->receiptEmail = $values['receiptEmail'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
