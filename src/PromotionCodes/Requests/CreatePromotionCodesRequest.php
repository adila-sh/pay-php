<?php

namespace AdilaPay\PromotionCodes\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;
use AdilaPay\PromotionCodes\Types\CreatePromotionCodesRequestDiscountPercentOff;
use AdilaPay\PromotionCodes\Types\CreatePromotionCodesRequestDiscountAmountOff;
use AdilaPay\Core\Types\Union;
use AdilaPay\PromotionCodes\Types\CreatePromotionCodesRequestDuration;
use AdilaPay\Core\Types\ArrayType;

class CreatePromotionCodesRequest extends JsonSerializableType
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
     * @var string $code
     */
    #[JsonProperty('code')]
    public string $code;

    /**
     * @var (
     *    CreatePromotionCodesRequestDiscountPercentOff
     *   |CreatePromotionCodesRequestDiscountAmountOff
     * ) $discount
     */
    #[JsonProperty('discount'), Union(CreatePromotionCodesRequestDiscountPercentOff::class, CreatePromotionCodesRequestDiscountAmountOff::class)]
    public CreatePromotionCodesRequestDiscountPercentOff|CreatePromotionCodesRequestDiscountAmountOff $discount;

    /**
     * @var value-of<CreatePromotionCodesRequestDuration> $duration
     */
    #[JsonProperty('duration')]
    public string $duration;

    /**
     * @var ?int $durationInMonths
     */
    #[JsonProperty('duration_in_months')]
    public ?int $durationInMonths;

    /**
     * @var ?int $maxRedemptions
     */
    #[JsonProperty('max_redemptions')]
    public ?int $maxRedemptions;

    /**
     * @var ?int $expiresAt
     */
    #[JsonProperty('expires_at')]
    public ?int $expiresAt;

    /**
     * @var ?array<string> $products
     */
    #[JsonProperty('products'), ArrayType(['string'])]
    public ?array $products;

    /**
     * @param array{
     *   organizationId: string,
     *   idempotencyKey: string,
     *   code: string,
     *   discount: (
     *    CreatePromotionCodesRequestDiscountPercentOff
     *   |CreatePromotionCodesRequestDiscountAmountOff
     * ),
     *   duration: value-of<CreatePromotionCodesRequestDuration>,
     *   durationInMonths?: ?int,
     *   maxRedemptions?: ?int,
     *   expiresAt?: ?int,
     *   products?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->code = $values['code'];
        $this->discount = $values['discount'];
        $this->duration = $values['duration'];
        $this->durationInMonths = $values['durationInMonths'] ?? null;
        $this->maxRedemptions = $values['maxRedemptions'] ?? null;
        $this->expiresAt = $values['expiresAt'] ?? null;
        $this->products = $values['products'] ?? null;
    }
}
