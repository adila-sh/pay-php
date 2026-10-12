<?php

namespace AdilaPay\Customers\Requests;

use AdilaPay\Core\Json\JsonSerializableType;
use AdilaPay\Core\Json\JsonProperty;
use AdilaPay\Core\Types\ArrayType;

class UpdateCustomersRequest extends JsonSerializableType
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
     * @var string $idempotencyKey Chave estável da operação lógica. Reutilize apenas com os mesmos parâmetros em retries.
     */
    public string $idempotencyKey;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $phone
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?array<string, string> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'string'])]
    public ?array $metadata;

    /**
     * @param array{
     *   organizationId: string,
     *   id: string,
     *   idempotencyKey: string,
     *   name?: ?string,
     *   email?: ?string,
     *   phone?: ?string,
     *   description?: ?string,
     *   metadata?: ?array<string, string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->organizationId = $values['organizationId'];
        $this->id = $values['id'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->name = $values['name'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
