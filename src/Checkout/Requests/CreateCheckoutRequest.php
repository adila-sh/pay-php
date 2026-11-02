<?php

namespace AdilaPay\Checkout\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Checkout\Types\CreateCheckoutRequestMode;
use AdilaPay\Core\Json\JsonProperty;
use AdilaPay\Checkout\Types\CreateCheckoutRequestLineItemsItem;
use AdilaPay\Core\Types\ArrayType;
use AdilaPay\Checkout\Types\CreateCheckoutRequestSubscriptionData;
use AdilaPay\Checkout\Types\CreateCheckoutRequestTaxIdCollection;
use AdilaPay\Checkout\Types\CreateCheckoutRequestBillingAddressCollection;
use AdilaPay\Checkout\Types\CreateCheckoutRequestCustomerUpdate;

class CreateCheckoutRequest extends JsonSerializableType
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
     * @var value-of<CreateCheckoutRequestMode> $mode
     */
    #[JsonProperty('mode')]
    public string $mode;

    /**
     * @var array<CreateCheckoutRequestLineItemsItem> $lineItems
     */
    #[JsonProperty('line_items'), ArrayType([CreateCheckoutRequestLineItemsItem::class])]
    public array $lineItems;

    /**
     * @var ?string $customer
     */
    #[JsonProperty('customer')]
    public ?string $customer;

    /**
     * @var ?string $clientReferenceId
     */
    #[JsonProperty('client_reference_id')]
    public ?string $clientReferenceId;

    /**
     * @var ?bool $allowPromotionCodes
     */
    #[JsonProperty('allow_promotion_codes')]
    public ?bool $allowPromotionCodes;

    /**
     * @var ?CreateCheckoutRequestSubscriptionData $subscriptionData
     */
    #[JsonProperty('subscription_data')]
    public ?CreateCheckoutRequestSubscriptionData $subscriptionData;

    /**
     * @var ?CreateCheckoutRequestTaxIdCollection $taxIdCollection
     */
    #[JsonProperty('tax_id_collection')]
    public ?CreateCheckoutRequestTaxIdCollection $taxIdCollection;

    /**
     * @var ?value-of<CreateCheckoutRequestBillingAddressCollection> $billingAddressCollection
     */
    #[JsonProperty('billing_address_collection')]
    public ?string $billingAddressCollection;

    /**
     * @var ?CreateCheckoutRequestCustomerUpdate $customerUpdate
     */
    #[JsonProperty('customer_update')]
    public ?CreateCheckoutRequestCustomerUpdate $customerUpdate;

    /**
     * @var ?int $expiresAt
     */
    #[JsonProperty('expires_at')]
    public ?int $expiresAt;

    /**
     * @var ?string $successUrl
     */
    #[JsonProperty('success_url')]
    public ?string $successUrl;

    /**
     * @var ?string $cancelUrl
     */
    #[JsonProperty('cancel_url')]
    public ?string $cancelUrl;

    /**
     * @var ?array<string, string> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'string'])]
    public ?array $metadata;

    /**
     * @param array{
     *   organizationId: string,
     *   idempotencyKey: string,
     *   mode: value-of<CreateCheckoutRequestMode>,
     *   lineItems: array<CreateCheckoutRequestLineItemsItem>,
     *   customer?: ?string,
     *   clientReferenceId?: ?string,
     *   allowPromotionCodes?: ?bool,
     *   subscriptionData?: ?CreateCheckoutRequestSubscriptionData,
     *   taxIdCollection?: ?CreateCheckoutRequestTaxIdCollection,
     *   billingAddressCollection?: ?value-of<CreateCheckoutRequestBillingAddressCollection>,
     *   customerUpdate?: ?CreateCheckoutRequestCustomerUpdate,
     *   expiresAt?: ?int,
     *   successUrl?: ?string,
     *   cancelUrl?: ?string,
     *   metadata?: ?array<string, string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->mode = $values['mode'];
        $this->lineItems = $values['lineItems'];
        $this->customer = $values['customer'] ?? null;
        $this->clientReferenceId = $values['clientReferenceId'] ?? null;
        $this->allowPromotionCodes = $values['allowPromotionCodes'] ?? null;
        $this->subscriptionData = $values['subscriptionData'] ?? null;
        $this->taxIdCollection = $values['taxIdCollection'] ?? null;
        $this->billingAddressCollection = $values['billingAddressCollection'] ?? null;
        $this->customerUpdate = $values['customerUpdate'] ?? null;
        $this->expiresAt = $values['expiresAt'] ?? null;
        $this->successUrl = $values['successUrl'] ?? null;
        $this->cancelUrl = $values['cancelUrl'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
