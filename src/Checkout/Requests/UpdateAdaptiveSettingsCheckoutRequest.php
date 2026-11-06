<?php

namespace AdilaPay\Checkout\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class UpdateAdaptiveSettingsCheckoutRequest extends JsonSerializableType
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
     * @var bool $enabled
     */
    #[JsonProperty('enabled')]
    public bool $enabled;

    /**
     * @var bool $confirmed
     */
    #[JsonProperty('confirmed')]
    public bool $confirmed;

    /**
     * @param array{
     *   organizationId: string,
     *   idempotencyKey: string,
     *   enabled: bool,
     *   confirmed: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->enabled = $values['enabled'];
        $this->confirmed = $values['confirmed'];
    }
}
