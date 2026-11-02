<?php

namespace AdilaPay\UsagePreview\Requests;

use AdilaPay\Core\Json\JsonSerializableType;

class RetrieveUsagePreviewRequest extends JsonSerializableType
{
    /**
     * @var string $organizationId UUID da organização vinculada à API key ou à sessão autorizada.
     */
    public string $organizationId;

    /**
     * @var string $subscription
     */
    public string $subscription;

    /**
     * @var string $customer
     */
    public string $customer;

    /**
     * @param array{
     *   organizationId: string,
     *   subscription: string,
     *   customer: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->subscription = $values['subscription'];
        $this->customer = $values['customer'];
    }
}
