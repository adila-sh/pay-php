<?php

namespace AdilaPay\PaymentMethodDomains;

use Psr\Http\Client\ClientInterface;
use AdilaPay\Core\Client\RawClient;
use AdilaPay\PaymentMethodDomains\Requests\ListPaymentMethodDomainsRequest;
use AdilaPay\Types\StripeList;
use AdilaPay\Exceptions\AdilaPayException;
use AdilaPay\Exceptions\AdilaPayApiException;
use AdilaPay\Core\Json\JsonApiRequest;
use AdilaPay\Environments;
use AdilaPay\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use AdilaPay\PaymentMethodDomains\Requests\CreatePaymentMethodDomainsRequest;
use AdilaPay\Core\Json\JsonDecoder;
use AdilaPay\PaymentMethodDomains\Requests\RetrievePaymentMethodDomainsRequest;
use AdilaPay\PaymentMethodDomains\Requests\UpdatePaymentMethodDomainsRequest;
use AdilaPay\PaymentMethodDomains\Requests\ValidatePaymentMethodDomainsRequest;

class PaymentMethodDomainsClient
{
    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options @phpstan-ignore-next-line Property is used in endpoint methods via HttpEndpointGenerator
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param RawClient $client
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        RawClient $client,
        ?array $options = null,
    ) {
        $this->client = $client;
        $this->options = $options ?? [];
    }

    /**
     * Permissão: `payments:read`. A conta Stripe é resolvida no servidor a partir da organização autorizada.
     *
     * Example:
     * ```php
     * $client->paymentMethodDomains->list(
     *     new ListPaymentMethodDomainsRequest([
     *         'organizationId' => 'organizationId',
     *     ]),
     * );
     * ```
     *
     * @param ListPaymentMethodDomainsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?StripeList
     * @throws AdilaPayException
     * @throws AdilaPayApiException
     */
    public function list(ListPaymentMethodDomainsRequest $request, ?array $options = null): ?StripeList
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit !== null) {
            $query['limit'] = $request->limit;
        }
        if ($request->startingAfter !== null) {
            $query['starting_after'] = $request->startingAfter;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v2/organizations/" . RawClient::encodePathParam($request->organizationId) . "/stripe/payment-method-domains",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return StripeList::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new AdilaPayException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new AdilaPayException(message: $e->getMessage(), previous: $e);
        }
        throw new AdilaPayApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Permissão: `payments:write`. A conta Stripe é resolvida no servidor a partir da organização autorizada. Exige Idempotency-Key com 8 a 255 caracteres.
     *
     * Example:
     * ```php
     * $client->paymentMethodDomains->create(
     *     new CreatePaymentMethodDomainsRequest([
     *         'organizationId' => 'organizationId',
     *         'idempotencyKey' => 'idempotency-key',
     *         'domainName' => 'domain_name',
     *     ]),
     * );
     * ```
     *
     * @param CreatePaymentMethodDomainsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?array<string, mixed>
     * @throws AdilaPayException
     * @throws AdilaPayApiException
     */
    public function create(CreatePaymentMethodDomainsRequest $request, ?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        $headers = [];
        $headers['idempotency-key'] = $request->idempotencyKey;
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v2/organizations/" . RawClient::encodePathParam($request->organizationId) . "/stripe/payment-method-domains",
                    method: HttpMethod::POST,
                    headers: $headers,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return JsonDecoder::decodeArray($json, ['string' => 'mixed']); // @phpstan-ignore-line
            }
        } catch (JsonException $e) {
            throw new AdilaPayException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new AdilaPayException(message: $e->getMessage(), previous: $e);
        }
        throw new AdilaPayApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Permissão: `payments:read`. A conta Stripe é resolvida no servidor a partir da organização autorizada.
     *
     * Example:
     * ```php
     * $client->paymentMethodDomains->retrieve(
     *     new RetrievePaymentMethodDomainsRequest([
     *         'organizationId' => 'organizationId',
     *         'id' => 'id',
     *     ]),
     * );
     * ```
     *
     * @param RetrievePaymentMethodDomainsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?array<string, mixed>
     * @throws AdilaPayException
     * @throws AdilaPayApiException
     */
    public function retrieve(RetrievePaymentMethodDomainsRequest $request, ?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v2/organizations/" . RawClient::encodePathParam($request->organizationId) . "/stripe/payment-method-domains/" . RawClient::encodePathParam($request->id),
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return JsonDecoder::decodeArray($json, ['string' => 'mixed']); // @phpstan-ignore-line
            }
        } catch (JsonException $e) {
            throw new AdilaPayException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new AdilaPayException(message: $e->getMessage(), previous: $e);
        }
        throw new AdilaPayApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Permissão: `payments:write`. A conta Stripe é resolvida no servidor a partir da organização autorizada. Exige Idempotency-Key com 8 a 255 caracteres.
     *
     * Example:
     * ```php
     * $client->paymentMethodDomains->update(
     *     new UpdatePaymentMethodDomainsRequest([
     *         'organizationId' => 'organizationId',
     *         'id' => 'id',
     *         'idempotencyKey' => 'idempotency-key',
     *         'enabled' => true,
     *     ]),
     * );
     * ```
     *
     * @param UpdatePaymentMethodDomainsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?array<string, mixed>
     * @throws AdilaPayException
     * @throws AdilaPayApiException
     */
    public function update(UpdatePaymentMethodDomainsRequest $request, ?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        $headers = [];
        $headers['idempotency-key'] = $request->idempotencyKey;
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v2/organizations/" . RawClient::encodePathParam($request->organizationId) . "/stripe/payment-method-domains/" . RawClient::encodePathParam($request->id),
                    method: HttpMethod::PATCH,
                    headers: $headers,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return JsonDecoder::decodeArray($json, ['string' => 'mixed']); // @phpstan-ignore-line
            }
        } catch (JsonException $e) {
            throw new AdilaPayException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new AdilaPayException(message: $e->getMessage(), previous: $e);
        }
        throw new AdilaPayApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Permissão: `payments:write`. A conta Stripe é resolvida no servidor a partir da organização autorizada. Exige Idempotency-Key com 8 a 255 caracteres.
     *
     * Example:
     * ```php
     * $client->paymentMethodDomains->validate(
     *     new ValidatePaymentMethodDomainsRequest([
     *         'organizationId' => 'organizationId',
     *         'id' => 'id',
     *         'idempotencyKey' => 'idempotency-key',
     *     ]),
     * );
     * ```
     *
     * @param ValidatePaymentMethodDomainsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?array<string, mixed>
     * @throws AdilaPayException
     * @throws AdilaPayApiException
     */
    public function validate(ValidatePaymentMethodDomainsRequest $request, ?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        $headers = [];
        $headers['idempotency-key'] = $request->idempotencyKey;
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v2/organizations/" . RawClient::encodePathParam($request->organizationId) . "/stripe/payment-method-domains/" . RawClient::encodePathParam($request->id) . "/validate",
                    method: HttpMethod::POST,
                    headers: $headers,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return JsonDecoder::decodeArray($json, ['string' => 'mixed']); // @phpstan-ignore-line
            }
        } catch (JsonException $e) {
            throw new AdilaPayException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new AdilaPayException(message: $e->getMessage(), previous: $e);
        }
        throw new AdilaPayApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }
}
