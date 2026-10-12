<?php

namespace AdilaPay\Checkout\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Checkout\Types\CreateCheckoutRequestMode;
use AdilaPay\Core\Json\JsonProperty;
use AdilaPay\Checkout\Types\CreateCheckoutRequestLineItemsItem;
use AdilaPay\Core\Types\ArrayType;

class CreateCheckoutRequest extends JsonSerializableType
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
     * @var value-of<CreateCheckoutRequestMode> $mode
     */
    #[JsonProperty('mode')]
    public string $mode;

    /**
     * @var array<CreateCheckoutRequestLineItemsItem> $lineItems
     */
    #[JsonProperty('line_items'), ArrayType([CreateCheckoutRequestLineItemsItem::class])]
    public array $lineItems;

    /**
     * @var ?string $customer
     */
    #[JsonProperty('customer')]
    public ?string $customer;

    /**
     * @var ?string $clientReferenceId
     */
    #[JsonProperty('client_reference_id')]
    public ?string $clientReferenceId;

    /**
     * @var ?bool $allowPromotionCodes
     */
    #[JsonProperty('allow_promotion_codes')]
    public ?bool $allowPromotionCodes;

    /**
     * @var ?array<string, string> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'string'])]
    public ?array $metadata;

    /**
     * @param array{
     *   organizationId: string,
     *   idempotencyKey: string,
     *   mode: value-of<CreateCheckoutRequestMode>,
     *   lineItems: array<CreateCheckoutRequestLineItemsItem>,
     *   customer?: ?string,
     *   clientReferenceId?: ?string,
     *   allowPromotionCodes?: ?bool,
     *   metadata?: ?array<string, string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->mode = $values['mode'];
        $this->lineItems = $values['lineItems'];
        $this->customer = $values['customer'] ?? null;
        $this->clientReferenceId = $values['clientReferenceId'] ?? null;
        $this->allowPromotionCodes = $values['allowPromotionCodes'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
