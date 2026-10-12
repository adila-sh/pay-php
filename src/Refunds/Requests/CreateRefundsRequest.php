<?php

namespace AdilaPay\Refunds\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;
use AdilaPay\Refunds\Types\CreateRefundsRequestReason;
use AdilaPay\Core\Types\ArrayType;

class CreateRefundsRequest extends JsonSerializableType
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
     * @var string $paymentIntent
     */
    #[JsonProperty('payment_intent')]
    public string $paymentIntent;

    /**
     * @var ?int $amount
     */
    #[JsonProperty('amount')]
    public ?int $amount;

    /**
     * @var ?value-of<CreateRefundsRequestReason> $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?array<string, string> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'string'])]
    public ?array $metadata;

    /**
     * @param array{
     *   organizationId: string,
     *   idempotencyKey: string,
     *   paymentIntent: string,
     *   amount?: ?int,
     *   reason?: ?value-of<CreateRefundsRequestReason>,
     *   metadata?: ?array<string, string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->paymentIntent = $values['paymentIntent'];
        $this->amount = $values['amount'] ?? null;
        $this->reason = $values['reason'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
