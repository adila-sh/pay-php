<?php

namespace AdilaPay\Authorizations\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;
use AdilaPay\Authorizations\Types\PreviewAuthorizationsRequestAction;

class PreviewAuthorizationsRequest extends JsonSerializableType
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
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<PreviewAuthorizationsRequestAction> $action
     */
    #[JsonProperty('action')]
    public string $action;

    /**
     * @var ?int $amountToCapture
     */
    #[JsonProperty('amount_to_capture')]
    public ?int $amountToCapture;

    /**
     * @param array{
     *   organizationId: string,
     *   idempotencyKey: string,
     *   id: string,
     *   action: value-of<PreviewAuthorizationsRequestAction>,
     *   amountToCapture?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->id = $values['id'];
        $this->action = $values['action'];
        $this->amountToCapture = $values['amountToCapture'] ?? null;
    }
}
