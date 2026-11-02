<?php

namespace AdilaPay\Subscriptions\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class UpdatePaymentMethodSubscriptionsRequest extends JsonSerializableType
{
    /**
     * @var string $organizationId UUID da organização vinculada à API key ou à sessão autorizada.
     */
    public string $organizationId;

    /**
     * @var string $id
     */
    public string $id;

    /**
     * @var string $idempotencyKey Chave estável da operação lógica. Reutilize apenas com os mesmos parâmetros em retries.
     */
    public string $idempotencyKey;

    /**
     * @var string $setupIntent
     */
    #[JsonProperty('setup_intent')]
    public string $setupIntent;

    /**
     * @param array{
     *   organizationId: string,
     *   id: string,
     *   idempotencyKey: string,
     *   setupIntent: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->id = $values['id'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->setupIntent = $values['setupIntent'];
    }
}
