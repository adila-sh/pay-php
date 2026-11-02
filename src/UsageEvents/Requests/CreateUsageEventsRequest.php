<?php

namespace AdilaPay\UsageEvents\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class CreateUsageEventsRequest extends JsonSerializableType
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
     * @var string $identifier
     */
    #[JsonProperty('identifier')]
    public string $identifier;

    /**
     * @var string $meter
     */
    #[JsonProperty('meter')]
    public string $meter;

    /**
     * @var string $customer
     */
    #[JsonProperty('customer')]
    public string $customer;

    /**
     * @var int $timestamp
     */
    #[JsonProperty('timestamp')]
    public int $timestamp;

    /**
     * @var int $value
     */
    #[JsonProperty('value')]
    public int $value;

    /**
     * @param array{
     *   organizationId: string,
     *   idempotencyKey: string,
     *   identifier: string,
     *   meter: string,
     *   customer: string,
     *   timestamp: int,
     *   value: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->identifier = $values['identifier'];
        $this->meter = $values['meter'];
        $this->customer = $values['customer'];
        $this->timestamp = $values['timestamp'];
        $this->value = $values['value'];
    }
}
