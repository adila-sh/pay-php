<?php

namespace AdilaPay\Products\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;
use AdilaPay\Core\Types\ArrayType;
use AdilaPay\Products\Types\CreateProductsRequestMarketingFeaturesItem;
use AdilaPay\Products\Types\CreateProductsRequestDefaultPriceData;

class CreateProductsRequest extends JsonSerializableType
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
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?bool $active
     */
    #[JsonProperty('active')]
    public ?bool $active;

    /**
     * @var ?array<string> $images
     */
    #[JsonProperty('images'), ArrayType(['string'])]
    public ?array $images;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?string $statementDescriptor
     */
    #[JsonProperty('statement_descriptor')]
    public ?string $statementDescriptor;

    /**
     * @var ?string $unitLabel
     */
    #[JsonProperty('unit_label')]
    public ?string $unitLabel;

    /**
     * @var ?array<CreateProductsRequestMarketingFeaturesItem> $marketingFeatures
     */
    #[JsonProperty('marketing_features'), ArrayType([CreateProductsRequestMarketingFeaturesItem::class])]
    public ?array $marketingFeatures;

    /**
     * @var ?bool $shippable
     */
    #[JsonProperty('shippable')]
    public ?bool $shippable;

    /**
     * @var ?array<string, string> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'string'])]
    public ?array $metadata;

    /**
     * @var ?CreateProductsRequestDefaultPriceData $defaultPriceData
     */
    #[JsonProperty('default_price_data')]
    public ?CreateProductsRequestDefaultPriceData $defaultPriceData;

    /**
     * @param array{
     *   organizationId: string,
     *   idempotencyKey: string,
     *   name: string,
     *   description?: ?string,
     *   active?: ?bool,
     *   images?: ?array<string>,
     *   url?: ?string,
     *   statementDescriptor?: ?string,
     *   unitLabel?: ?string,
     *   marketingFeatures?: ?array<CreateProductsRequestMarketingFeaturesItem>,
     *   shippable?: ?bool,
     *   metadata?: ?array<string, string>,
     *   defaultPriceData?: ?CreateProductsRequestDefaultPriceData,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->name = $values['name'];
        $this->description = $values['description'] ?? null;
        $this->active = $values['active'] ?? null;
        $this->images = $values['images'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->statementDescriptor = $values['statementDescriptor'] ?? null;
        $this->unitLabel = $values['unitLabel'] ?? null;
        $this->marketingFeatures = $values['marketingFeatures'] ?? null;
        $this->shippable = $values['shippable'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->defaultPriceData = $values['defaultPriceData'] ?? null;
    }
}
