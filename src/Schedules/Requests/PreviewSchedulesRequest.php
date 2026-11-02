<?php

namespace AdilaPay\Schedules\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Schedules\Types\PreviewSchedulesRequestSource;
use AdilaPay\Core\Json\JsonProperty;
use AdilaPay\Schedules\Types\PreviewSchedulesRequestAction;
use AdilaPay\Schedules\Types\PreviewSchedulesRequestPhasesItem;
use AdilaPay\Core\Types\ArrayType;

class PreviewSchedulesRequest extends JsonSerializableType
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
     * @var value-of<PreviewSchedulesRequestSource> $source
     */
    #[JsonProperty('source')]
    public string $source;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<PreviewSchedulesRequestAction> $action
     */
    #[JsonProperty('action')]
    public string $action;

    /**
     * @var ?int $startDate
     */
    #[JsonProperty('start_date')]
    public ?int $startDate;

    /**
     * @var ?array<PreviewSchedulesRequestPhasesItem> $phases
     */
    #[JsonProperty('phases'), ArrayType([PreviewSchedulesRequestPhasesItem::class])]
    public ?array $phases;

    /**
     * @param array{
     *   organizationId: string,
     *   idempotencyKey: string,
     *   source: value-of<PreviewSchedulesRequestSource>,
     *   id: string,
     *   action: value-of<PreviewSchedulesRequestAction>,
     *   startDate?: ?int,
     *   phases?: ?array<PreviewSchedulesRequestPhasesItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->source = $values['source'];
        $this->id = $values['id'];
        $this->action = $values['action'];
        $this->startDate = $values['startDate'] ?? null;
        $this->phases = $values['phases'] ?? null;
    }
}
