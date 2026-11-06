<?php

namespace AdilaPay\PaymentMethodDomains\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class CreatePaymentMethodDomainsRequest extends JsonSerializableType
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
     * @var string $domainName
     */
    #[JsonProperty('domain_name')]
    public string $domainName;

    /**
     * @param array{
     *   organizationId: string,
     *   idempotencyKey: string,
     *   domainName: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->domainName = $values['domainName'];
    }
}
