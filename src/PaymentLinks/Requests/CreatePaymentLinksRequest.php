<?php

namespace AdilaPay\PaymentLinks\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\PaymentLinks\Types\CreatePaymentLinksRequestLineItemsItem;
use AdilaPay\Core\Json\JsonProperty;
use AdilaPay\Core\Types\ArrayType;

class CreatePaymentLinksRequest extends JsonSerializableType
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
     * @var array<CreatePaymentLinksRequestLineItemsItem> $lineItems
     */
    #[JsonProperty('line_items'), ArrayType([CreatePaymentLinksRequestLineItemsItem::class])]
    public array $lineItems;

    /**
     * @var ?bool $allowPromotionCodes
     */
    #[JsonProperty('allow_promotion_codes')]
    public ?bool $allowPromotionCodes;

    /**
     * @var ?int $completedSessionsLimit
     */
    #[JsonProperty('completed_sessions_limit')]
    public ?int $completedSessionsLimit;

    /**
     * @var ?string $inactiveMessage
     */
    #[JsonProperty('inactive_message')]
    public ?string $inactiveMessage;

    /**
     * @var ?string $confirmationMessage
     */
    #[JsonProperty('confirmation_message')]
    public ?string $confirmationMessage;

    /**
     * @var ?array<string, string> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'string'])]
    public ?array $metadata;

    /**
     * @param array{
     *   organizationId: string,
     *   idempotencyKey: string,
     *   lineItems: array<CreatePaymentLinksRequestLineItemsItem>,
     *   allowPromotionCodes?: ?bool,
     *   completedSessionsLimit?: ?int,
     *   inactiveMessage?: ?string,
     *   confirmationMessage?: ?string,
     *   metadata?: ?array<string, string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->lineItems = $values['lineItems'];
        $this->allowPromotionCodes = $values['allowPromotionCodes'] ?? null;
        $this->completedSessionsLimit = $values['completedSessionsLimit'] ?? null;
        $this->inactiveMessage = $values['inactiveMessage'] ?? null;
        $this->confirmationMessage = $values['confirmationMessage'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
