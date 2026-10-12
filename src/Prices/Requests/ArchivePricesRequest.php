<?php

namespace AdilaPay\Prices\Requests;

use AdilaPay\Core\Json\JsonSerializableType;

class ArchivePricesRequest extends JsonSerializableType
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
     * @param array{
     *   organizationId: string,
     *   id: string,
     *   idempotencyKey: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->id = $values['id'];
        $this->idempotencyKey = $values['idempotencyKey'];
    }
}
