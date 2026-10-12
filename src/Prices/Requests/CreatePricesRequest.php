<?php

namespace AdilaPay\Prices\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;
use AdilaPay\Prices\Types\CreatePricesRequestProductData;
use AdilaPay\Prices\Types\CreatePricesRequestTaxBehavior;
use AdilaPay\Prices\Types\CreatePricesRequestRecurring;
use AdilaPay\Prices\Types\CreatePricesRequestBillingScheme;
use AdilaPay\Prices\Types\CreatePricesRequestTiersMode;
use AdilaPay\Prices\Types\CreatePricesRequestTiersItem;
use AdilaPay\Core\Types\ArrayType;
use AdilaPay\Prices\Types\CreatePricesRequestCustomUnitAmount;
use AdilaPay\Prices\Types\CreatePricesRequestTransformQuantity;

class CreatePricesRequest extends JsonSerializableType
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
     * @var ?string $product
     */
    #[JsonProperty('product')]
    public ?string $product;

    /**
     * @var ?CreatePricesRequestProductData $productData
     */
    #[JsonProperty('product_data')]
    public ?CreatePricesRequestProductData $productData;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var ?int $unitAmount
     */
    #[JsonProperty('unit_amount')]
    public ?int $unitAmount;

    /**
     * @var ?string $nickname
     */
    #[JsonProperty('nickname')]
    public ?string $nickname;

    /**
     * @var ?string $lookupKey
     */
    #[JsonProperty('lookup_key')]
    public ?string $lookupKey;

    /**
     * @var ?value-of<CreatePricesRequestTaxBehavior> $taxBehavior
     */
    #[JsonProperty('tax_behavior')]
    public ?string $taxBehavior;

    /**
     * @var ?CreatePricesRequestRecurring $recurring
     */
    #[JsonProperty('recurring')]
    public ?CreatePricesRequestRecurring $recurring;

    /**
     * @var ?value-of<CreatePricesRequestBillingScheme> $billingScheme
     */
    #[JsonProperty('billing_scheme')]
    public ?string $billingScheme;

    /**
     * @var ?value-of<CreatePricesRequestTiersMode> $tiersMode
     */
    #[JsonProperty('tiers_mode')]
    public ?string $tiersMode;

    /**
     * @var ?array<CreatePricesRequestTiersItem> $tiers
     */
    #[JsonProperty('tiers'), ArrayType([CreatePricesRequestTiersItem::class])]
    public ?array $tiers;

    /**
     * @var ?CreatePricesRequestCustomUnitAmount $customUnitAmount
     */
    #[JsonProperty('custom_unit_amount')]
    public ?CreatePricesRequestCustomUnitAmount $customUnitAmount;

    /**
     * @var ?CreatePricesRequestTransformQuantity $transformQuantity
     */
    #[JsonProperty('transform_quantity')]
    public ?CreatePricesRequestTransformQuantity $transformQuantity;

    /**
     * @var ?array<string, string> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'string'])]
    public ?array $metadata;

    /**
     * @param array{
     *   organizationId: string,
     *   idempotencyKey: string,
     *   currency: string,
     *   product?: ?string,
     *   productData?: ?CreatePricesRequestProductData,
     *   unitAmount?: ?int,
     *   nickname?: ?string,
     *   lookupKey?: ?string,
     *   taxBehavior?: ?value-of<CreatePricesRequestTaxBehavior>,
     *   recurring?: ?CreatePricesRequestRecurring,
     *   billingScheme?: ?value-of<CreatePricesRequestBillingScheme>,
     *   tiersMode?: ?value-of<CreatePricesRequestTiersMode>,
     *   tiers?: ?array<CreatePricesRequestTiersItem>,
     *   customUnitAmount?: ?CreatePricesRequestCustomUnitAmount,
     *   transformQuantity?: ?CreatePricesRequestTransformQuantity,
     *   metadata?: ?array<string, string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->product = $values['product'] ?? null;
        $this->productData = $values['productData'] ?? null;
        $this->currency = $values['currency'];
        $this->unitAmount = $values['unitAmount'] ?? null;
        $this->nickname = $values['nickname'] ?? null;
        $this->lookupKey = $values['lookupKey'] ?? null;
        $this->taxBehavior = $values['taxBehavior'] ?? null;
        $this->recurring = $values['recurring'] ?? null;
        $this->billingScheme = $values['billingScheme'] ?? null;
        $this->tiersMode = $values['tiersMode'] ?? null;
        $this->tiers = $values['tiers'] ?? null;
        $this->customUnitAmount = $values['customUnitAmount'] ?? null;
        $this->transformQuantity = $values['transformQuantity'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
