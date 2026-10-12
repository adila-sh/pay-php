<?php

namespace AdilaPay\BillingPortal\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

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
     * @param array{
     *   organizationId: string,
     *   idempotencyKey: string,
     *   customer: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->customer = $values['customer'];
    }
}
