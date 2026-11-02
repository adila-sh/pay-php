<?php

namespace AdilaPay\Disputes\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class SubmitDefenseDisputesRequest extends JsonSerializableType
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
     * @var string $reviewId
     */
    #[JsonProperty('review_id')]
    public string $reviewId;

    /**
     * @var bool $confirmed
     */
    #[JsonProperty('confirmed')]
    public bool $confirmed;

    /**
     * @param array{
     *   organizationId: string,
     *   id: string,
     *   idempotencyKey: string,
     *   reviewId: string,
     *   confirmed: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->id = $values['id'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->reviewId = $values['reviewId'];
        $this->confirmed = $values['confirmed'];
    }
}
