<?php

namespace AdilaPay\BillingPortal\Types;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class CreateBillingPortalResponse extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $url
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var int $expiresAt
     */
    #[JsonProperty('expires_at')]
    public int $expiresAt;

    /**
     * @param array{
     *   id: string,
     *   url: string,
     *   expiresAt: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->url = $values['url'];
        $this->expiresAt = $values['expiresAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
