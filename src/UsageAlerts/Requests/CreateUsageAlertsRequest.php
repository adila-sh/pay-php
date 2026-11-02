<?php

namespace AdilaPay\UsageAlerts\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class CreateUsageAlertsRequest extends JsonSerializableType
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
     * @var string $title
     */
    #[JsonProperty('title')]
    public string $title;

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
     * @var int $threshold
     */
    #[JsonProperty('threshold')]
    public int $threshold;

    /**
     * @param array{
     *   organizationId: string,
     *   idempotencyKey: string,
     *   title: string,
     *   meter: string,
     *   customer: string,
     *   threshold: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->title = $values['title'];
        $this->meter = $values['meter'];
        $this->customer = $values['customer'];
        $this->threshold = $values['threshold'];
    }
}
