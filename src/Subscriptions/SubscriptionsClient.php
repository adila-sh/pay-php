<?php

namespace AdilaPay\Subscriptions;

use Psr\Http\Client\ClientInterface;
use AdilaPay\Core\Client\RawClient;
use AdilaPay\Subscriptions\Requests\ListSubscriptionsRequest;
use AdilaPay\Types\StripeList;
use AdilaPay\Exceptions\AdilaPayException;
use AdilaPay\Exceptions\AdilaPayApiException;
use AdilaPay\Core\Json\JsonApiRequest;
use AdilaPay\Environments;
use AdilaPay\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use AdilaPay\Subscriptions\Requests\RetrieveSubscriptionsRequest;
use AdilaPay\Core\Json\JsonDecoder;
use AdilaPay\Subscriptions\Requests\UpdateSubscriptionsRequest;

class SubscriptionsClient
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
     * Permissão: `subscriptions:read`. A conta Stripe é resolvida no servidor a partir da organização autorizada.
     *
     * Example:
     * ```php
     * $client->subscriptions->list(
     *     new ListSubscriptionsRequest([
     *         'organizationId' => 'organizationId',
     *     ]),
     * );
     * ```
     *
     * @param ListSubscriptionsRequest $request
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
    public function list(ListSubscriptionsRequest $request, ?array $options = null): ?StripeList
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
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
                    path: "v2/organizations/" . RawClient::encodePathParam($request->organizationId) . "/stripe/subscriptions",
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
     * Permissão: `subscriptions:read`. A conta Stripe é resolvida no servidor a partir da organização autorizada.
     *
     * Example:
     * ```php
     * $client->subscriptions->retrieve(
     *     new RetrieveSubscriptionsRequest([
     *         'organizationId' => 'organizationId',
     *         'id' => 'id',
     *     ]),
     * );
     * ```
     *
     * @param RetrieveSubscriptionsRequest $request
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
    public function retrieve(RetrieveSubscriptionsRequest $request, ?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v2/organizations/" . RawClient::encodePathParam($request->organizationId) . "/stripe/subscriptions/" . RawClient::encodePathParam($request->id),
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
     * Permissão: `subscriptions:write`. A conta Stripe é resolvida no servidor a partir da organização autorizada. Exige Idempotency-Key com 8 a 255 caracteres.
     *
     * Example:
     * ```php
     * $client->subscriptions->update(
     *     new UpdateSubscriptionsRequest([
     *         'organizationId' => 'organizationId',
     *         'id' => 'id',
     *         'idempotencyKey' => 'idempotency-key',
     *         'cancelAtPeriodEnd' => true,
     *     ]),
     * );
     * ```
     *
     * @param UpdateSubscriptionsRequest $request
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
    public function update(UpdateSubscriptionsRequest $request, ?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        $headers = [];
        $headers['idempotency-key'] = $request->idempotencyKey;
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v2/organizations/" . RawClient::encodePathParam($request->organizationId) . "/stripe/subscriptions/" . RawClient::encodePathParam($request->id),
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
}
