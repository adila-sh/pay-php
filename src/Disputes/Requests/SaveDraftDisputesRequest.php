<?php

namespace AdilaPay\Disputes\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;
use AdilaPay\Disputes\Types\SaveDraftDisputesRequestEvidence;

class SaveDraftDisputesRequest extends JsonSerializableType
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
     * @var string $revision
     */
    #[JsonProperty('revision')]
    public string $revision;

    /**
     * @var SaveDraftDisputesRequestEvidence $evidence
     */
    #[JsonProperty('evidence')]
    public SaveDraftDisputesRequestEvidence $evidence;

    /**
     * @param array{
     *   organizationId: string,
     *   id: string,
     *   idempotencyKey: string,
     *   revision: string,
     *   evidence: SaveDraftDisputesRequestEvidence,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->id = $values['id'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->revision = $values['revision'];
        $this->evidence = $values['evidence'];
    }
}
