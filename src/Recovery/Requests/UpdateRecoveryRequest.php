<?php

namespace AdilaPay\Recovery\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class UpdateRecoveryRequest extends JsonSerializableType
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
     * @var int $delayHours
     */
    #[JsonProperty('delayHours')]
    public int $delayHours;

    /**
     * @param array{
     *   organizationId: string,
     *   idempotencyKey: string,
     *   enabled: bool,
     *   delayHours: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->enabled = $values['enabled'];
        $this->delayHours = $values['delayHours'];
    }
}
