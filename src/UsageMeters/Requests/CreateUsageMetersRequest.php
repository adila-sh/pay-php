<?php

namespace AdilaPay\UsageMeters\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class CreateUsageMetersRequest extends JsonSerializableType
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
     * @var string $displayName
     */
    #[JsonProperty('display_name')]
    public string $displayName;

    /**
     * @var string $eventName
     */
    #[JsonProperty('event_name')]
    public string $eventName;

    /**
     * @param array{
     *   organizationId: string,
     *   idempotencyKey: string,
     *   displayName: string,
     *   eventName: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->displayName = $values['displayName'];
        $this->eventName = $values['eventName'];
    }
}
