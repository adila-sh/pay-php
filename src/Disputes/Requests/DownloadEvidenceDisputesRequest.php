<?php

namespace AdilaPay\Disputes\Requests;

use AdilaPay\Core\Json\JsonSerializableType;

class DownloadEvidenceDisputesRequest extends JsonSerializableType
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
     * @var string $fileId
     */
    public string $fileId;

    /**
     * @param array{
     *   organizationId: string,
     *   id: string,
     *   fileId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->id = $values['id'];
        $this->fileId = $values['fileId'];
    }
}
