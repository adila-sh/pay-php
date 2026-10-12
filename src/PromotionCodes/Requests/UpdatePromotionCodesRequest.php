<?php

namespace AdilaPay\PromotionCodes\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class UpdatePromotionCodesRequest extends JsonSerializableType
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
     * @var bool $active
     */
    #[JsonProperty('active')]
    public bool $active;

    /**
     * @param array{
     *   organizationId: string,
     *   id: string,
     *   idempotencyKey: string,
     *   active: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->id = $values['id'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->active = $values['active'];
    }
}
