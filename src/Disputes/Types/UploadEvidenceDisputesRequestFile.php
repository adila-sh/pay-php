<?php

namespace AdilaPay\Disputes\Types;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class UploadEvidenceDisputesRequestFile extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var value-of<UploadEvidenceDisputesRequestFileContentType> $contentType
     */
    #[JsonProperty('contentType')]
    public string $contentType;

    /**
     * @var string $data
     */
    #[JsonProperty('data')]
    public string $data;

    /**
     * @param array{
     *   name: string,
     *   contentType: value-of<UploadEvidenceDisputesRequestFileContentType>,
     *   data: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->contentType = $values['contentType'];
        $this->data = $values['data'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
