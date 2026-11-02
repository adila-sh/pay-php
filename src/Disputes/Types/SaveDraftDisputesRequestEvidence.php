<?php

namespace AdilaPay\Disputes\Types;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;

class SaveDraftDisputesRequestEvidence extends JsonSerializableType
{
    /**
     * @var ?string $customerName
     */
    #[JsonProperty('customer_name')]
    public ?string $customerName;

    /**
     * @var ?string $customerEmailAddress
     */
    #[JsonProperty('customer_email_address')]
    public ?string $customerEmailAddress;

    /**
     * @var ?string $customerPurchaseIp
     */
    #[JsonProperty('customer_purchase_ip')]
    public ?string $customerPurchaseIp;

    /**
     * @var ?string $billingAddress
     */
    #[JsonProperty('billing_address')]
    public ?string $billingAddress;

    /**
     * @var ?string $productDescription
     */
    #[JsonProperty('product_description')]
    public ?string $productDescription;

    /**
     * @var ?string $accessActivityLog
     */
    #[JsonProperty('access_activity_log')]
    public ?string $accessActivityLog;

    /**
     * @var ?string $cancellationPolicyDisclosure
     */
    #[JsonProperty('cancellation_policy_disclosure')]
    public ?string $cancellationPolicyDisclosure;

    /**
     * @var ?string $cancellationRebuttal
     */
    #[JsonProperty('cancellation_rebuttal')]
    public ?string $cancellationRebuttal;

    /**
     * @var ?string $duplicateChargeExplanation
     */
    #[JsonProperty('duplicate_charge_explanation')]
    public ?string $duplicateChargeExplanation;

    /**
     * @var ?string $duplicateChargeId
     */
    #[JsonProperty('duplicate_charge_id')]
    public ?string $duplicateChargeId;

    /**
     * @var ?string $refundPolicyDisclosure
     */
    #[JsonProperty('refund_policy_disclosure')]
    public ?string $refundPolicyDisclosure;

    /**
     * @var ?string $refundRefusalExplanation
     */
    #[JsonProperty('refund_refusal_explanation')]
    public ?string $refundRefusalExplanation;

    /**
     * @var ?string $serviceDate
     */
    #[JsonProperty('service_date')]
    public ?string $serviceDate;

    /**
     * @var ?string $shippingAddress
     */
    #[JsonProperty('shipping_address')]
    public ?string $shippingAddress;

    /**
     * @var ?string $shippingCarrier
     */
    #[JsonProperty('shipping_carrier')]
    public ?string $shippingCarrier;

    /**
     * @var ?string $shippingDate
     */
    #[JsonProperty('shipping_date')]
    public ?string $shippingDate;

    /**
     * @var ?string $shippingTrackingNumber
     */
    #[JsonProperty('shipping_tracking_number')]
    public ?string $shippingTrackingNumber;

    /**
     * @var ?string $uncategorizedText
     */
    #[JsonProperty('uncategorized_text')]
    public ?string $uncategorizedText;

    /**
     * @var ?string $cancellationPolicy
     */
    #[JsonProperty('cancellation_policy')]
    public ?string $cancellationPolicy;

    /**
     * @var ?string $customerCommunication
     */
    #[JsonProperty('customer_communication')]
    public ?string $customerCommunication;

    /**
     * @var ?string $customerSignature
     */
    #[JsonProperty('customer_signature')]
    public ?string $customerSignature;

    /**
     * @var ?string $duplicateChargeDocumentation
     */
    #[JsonProperty('duplicate_charge_documentation')]
    public ?string $duplicateChargeDocumentation;

    /**
     * @var ?string $receipt
     */
    #[JsonProperty('receipt')]
    public ?string $receipt;

    /**
     * @var ?string $refundPolicy
     */
    #[JsonProperty('refund_policy')]
    public ?string $refundPolicy;

    /**
     * @var ?string $serviceDocumentation
     */
    #[JsonProperty('service_documentation')]
    public ?string $serviceDocumentation;

    /**
     * @var ?string $shippingDocumentation
     */
    #[JsonProperty('shipping_documentation')]
    public ?string $shippingDocumentation;

    /**
     * @var ?string $uncategorizedFile
     */
    #[JsonProperty('uncategorized_file')]
    public ?string $uncategorizedFile;

    /**
     * @param array{
     *   customerName?: ?string,
     *   customerEmailAddress?: ?string,
     *   customerPurchaseIp?: ?string,
     *   billingAddress?: ?string,
     *   productDescription?: ?string,
     *   accessActivityLog?: ?string,
     *   cancellationPolicyDisclosure?: ?string,
     *   cancellationRebuttal?: ?string,
     *   duplicateChargeExplanation?: ?string,
     *   duplicateChargeId?: ?string,
     *   refundPolicyDisclosure?: ?string,
     *   refundRefusalExplanation?: ?string,
     *   serviceDate?: ?string,
     *   shippingAddress?: ?string,
     *   shippingCarrier?: ?string,
     *   shippingDate?: ?string,
     *   shippingTrackingNumber?: ?string,
     *   uncategorizedText?: ?string,
     *   cancellationPolicy?: ?string,
     *   customerCommunication?: ?string,
     *   customerSignature?: ?string,
     *   duplicateChargeDocumentation?: ?string,
     *   receipt?: ?string,
     *   refundPolicy?: ?string,
     *   serviceDocumentation?: ?string,
     *   shippingDocumentation?: ?string,
     *   uncategorizedFile?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customerName = $values['customerName'] ?? null;
        $this->customerEmailAddress = $values['customerEmailAddress'] ?? null;
        $this->customerPurchaseIp = $values['customerPurchaseIp'] ?? null;
        $this->billingAddress = $values['billingAddress'] ?? null;
        $this->productDescription = $values['productDescription'] ?? null;
        $this->accessActivityLog = $values['accessActivityLog'] ?? null;
        $this->cancellationPolicyDisclosure = $values['cancellationPolicyDisclosure'] ?? null;
        $this->cancellationRebuttal = $values['cancellationRebuttal'] ?? null;
        $this->duplicateChargeExplanation = $values['duplicateChargeExplanation'] ?? null;
        $this->duplicateChargeId = $values['duplicateChargeId'] ?? null;
        $this->refundPolicyDisclosure = $values['refundPolicyDisclosure'] ?? null;
        $this->refundRefusalExplanation = $values['refundRefusalExplanation'] ?? null;
        $this->serviceDate = $values['serviceDate'] ?? null;
        $this->shippingAddress = $values['shippingAddress'] ?? null;
        $this->shippingCarrier = $values['shippingCarrier'] ?? null;
        $this->shippingDate = $values['shippingDate'] ?? null;
        $this->shippingTrackingNumber = $values['shippingTrackingNumber'] ?? null;
        $this->uncategorizedText = $values['uncategorizedText'] ?? null;
        $this->cancellationPolicy = $values['cancellationPolicy'] ?? null;
        $this->customerCommunication = $values['customerCommunication'] ?? null;
        $this->customerSignature = $values['customerSignature'] ?? null;
        $this->duplicateChargeDocumentation = $values['duplicateChargeDocumentation'] ?? null;
        $this->receipt = $values['receipt'] ?? null;
        $this->refundPolicy = $values['refundPolicy'] ?? null;
        $this->serviceDocumentation = $values['serviceDocumentation'] ?? null;
        $this->shippingDocumentation = $values['shippingDocumentation'] ?? null;
        $this->uncategorizedFile = $values['uncategorizedFile'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
