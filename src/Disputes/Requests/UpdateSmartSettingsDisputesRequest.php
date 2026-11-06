<?php

namespace AdilaPay\Disputes\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Disputes\Types\UpdateSmartSettingsDisputesRequestPreference;
use AdilaPay\Core\Json\JsonProperty;

class UpdateSmartSettingsDisputesRequest extends JsonSerializableType
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
     * @var value-of<UpdateSmartSettingsDisputesRequestPreference> $preference
     */
    #[JsonProperty('preference')]
    public string $preference;

    /**
     * @var bool $confirmed
     */
    #[JsonProperty('confirmed')]
    public bool $confirmed;

    /**
     * @param array{
     *   organizationId: string,
     *   idempotencyKey: string,
     *   preference: value-of<UpdateSmartSettingsDisputesRequestPreference>,
     *   confirmed: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->preference = $values['preference'];
        $this->confirmed = $values['confirmed'];
    }
}
