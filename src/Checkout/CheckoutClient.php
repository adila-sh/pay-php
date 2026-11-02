<?php

namespace AdilaPay\Checkout;

use Psr\Http\Client\ClientInterface;
use AdilaPay\Core\Client\RawClient;
use AdilaPay\Checkout\Requests\ListCheckoutRequest;
use AdilaPay\Types\StripeList;
use AdilaPay\Exceptions\AdilaPayException;
use AdilaPay\Exceptions\AdilaPayApiException;
use AdilaPay\Core\Json\JsonApiRequest;
use AdilaPay\Environments;
use AdilaPay\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use AdilaPay\Checkout\Requests\CreateCheckoutRequest;
use AdilaPay\Core\Json\JsonDecoder;
use AdilaPay\Checkout\Requests\ExpireCheckoutRequest;
use AdilaPay\Checkout\Requests\RetrieveCheckoutRequest;

class CheckoutClient
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
     * $client->checkout->list(
     *     new ListCheckoutRequest([
     *         'organizationId' => 'organizationId',
     *         'customer' => 'customer',
     *     ]),
     * );
     * ```
     *
     * @param ListCheckoutRequest $request
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
    public function list(ListCheckoutRequest $request, ?array $options = null): ?StripeList
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['customer'] = $request->customer;
        if ($request->limit !== null) {
            $query['limit'] = $request->limit;
        }
        if ($request->startingAfter !== null) {
            $query['starting_after'] = $request->startingAfter;
        }
        if ($request->status !== null) {
            $query['status'] = $request->status;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v2/organizations/" . RawClient::encodePathParam($request->organizationId) . "/stripe/checkout/sessions",
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
     * Permissão: `payments:write`. A conta Stripe é resolvida no servidor a partir da organização autorizada. Exige Idempotency-Key com 8 a 255 caracteres. O modo subscription exige também subscriptions:write. As URLs de retorno são configuradas no servidor.
     *
     * Example:
     * ```php
     * $client->checkout->create(
     *     new CreateCheckoutRequest([
     *         'organizationId' => 'organizationId',
     *         'idempotencyKey' => 'idempotency-key',
     *         'mode' => CreateCheckoutRequestMode::Payment->value,
     *         'lineItems' => [
     *             new CreateCheckoutRequestLineItemsItem([
     *                 'price' => 'price',
     *             ]),
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param CreateCheckoutRequest $request
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
    public function create(CreateCheckoutRequest $request, ?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        $headers = [];
        $headers['idempotency-key'] = $request->idempotencyKey;
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v2/organizations/" . RawClient::encodePathParam($request->organizationId) . "/stripe/checkout/sessions",
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
     * Permissão: `payments:write`. A conta Stripe é resolvida no servidor a partir da organização autorizada. Exige Idempotency-Key com 8 a 255 caracteres.
     *
     * Example:
     * ```php
     * $client->checkout->expire(
     *     new ExpireCheckoutRequest([
     *         'organizationId' => 'organizationId',
     *         'id' => 'id',
     *         'idempotencyKey' => 'idempotency-key',
     *     ]),
     * );
     * ```
     *
     * @param ExpireCheckoutRequest $request
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
    public function expire(ExpireCheckoutRequest $request, ?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        $headers = [];
        $headers['idempotency-key'] = $request->idempotencyKey;
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v2/organizations/" . RawClient::encodePathParam($request->organizationId) . "/stripe/checkout/sessions/" . RawClient::encodePathParam($request->id) . "/expire",
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

    /**
     * Permissão: `payments:read`. A conta Stripe é resolvida no servidor a partir da organização autorizada.
     *
     * Example:
     * ```php
     * $client->checkout->retrieve(
     *     new RetrieveCheckoutRequest([
     *         'organizationId' => 'organizationId',
     *         'id' => 'id',
     *     ]),
     * );
     * ```
     *
     * @param RetrieveCheckoutRequest $request
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
    public function retrieve(RetrieveCheckoutRequest $request, ?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v2/organizations/" . RawClient::encodePathParam($request->organizationId) . "/stripe/checkout/sessions/" . RawClient::encodePathParam($request->id),
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
}
