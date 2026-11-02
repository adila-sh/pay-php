<?php

namespace AdilaPay\BillingPortal\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;
use AdilaPay\Core\Types\ArrayType;

class CreateBillingPortalRequest extends JsonSerializableType
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
     * @var ?string $subscription
     */
    #[JsonProperty('subscription')]
    public ?string $subscription;

    /**
     * @var ?array<string> $allowedPriceIds
     */
    #[JsonProperty('allowed_price_ids'), ArrayType(['string'])]
    public ?array $allowedPriceIds;

    /**
     * @var ?string $returnUrl
     */
    #[JsonProperty('return_url')]
    public ?string $returnUrl;

    /**
     * @param array{
     *   organizationId: string,
     *   idempotencyKey: string,
     *   customer: string,
     *   subscription?: ?string,
     *   allowedPriceIds?: ?array<string>,
     *   returnUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->customer = $values['customer'];
        $this->subscription = $values['subscription'] ?? null;
        $this->allowedPriceIds = $values['allowedPriceIds'] ?? null;
        $this->returnUrl = $values['returnUrl'] ?? null;
    }
}
