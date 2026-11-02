<?php

namespace AdilaPay\Authorizations\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class ApplyAuthorizationsRequest extends JsonSerializableType
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
     * @var string $previewId
     */
    #[JsonProperty('preview_id')]
    public string $previewId;

    /**
     * @var bool $confirmed
     */
    #[JsonProperty('confirmed')]
    public bool $confirmed;

    /**
     * @param array{
     *   organizationId: string,
     *   idempotencyKey: string,
     *   previewId: string,
     *   confirmed: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->previewId = $values['previewId'];
        $this->confirmed = $values['confirmed'];
    }
}
