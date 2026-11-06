<?php

namespace AdilaPay\Checkout\Requests;

use AdilaPay\Core\Json\JsonSerializableType;

class GetAdaptiveSettingsCheckoutRequest extends JsonSerializableType
{
    /**
     * @var string $organizationId UUID da organização vinculada à API key ou à sessão autorizada.
     */
    public string $organizationId;

    /**
     * @param array{
     *   organizationId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
    }
}
