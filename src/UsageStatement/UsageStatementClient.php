<?php

namespace AdilaPay\UsageStatement;

use Psr\Http\Client\ClientInterface;
use AdilaPay\Core\Client\RawClient;
use AdilaPay\UsageStatement\Requests\RetrieveUsageStatementRequest;
use AdilaPay\Exceptions\AdilaPayException;
use AdilaPay\Exceptions\AdilaPayApiException;
use AdilaPay\Core\Json\JsonApiRequest;
use AdilaPay\Environments;
use AdilaPay\Core\Client\HttpMethod;
use AdilaPay\Core\Json\JsonDecoder;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;

class UsageStatementClient
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
     * $client->usageStatement->retrieve(
     *     new RetrieveUsageStatementRequest([
     *         'organizationId' => 'organizationId',
     *         'meter' => 'meter',
     *         'customer' => 'customer',
     *         'startTime' => 1,
     *         'endTime' => 1,
     *     ]),
     * );
     * ```
     *
     * @param RetrieveUsageStatementRequest $request
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
    public function retrieve(RetrieveUsageStatementRequest $request, ?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['meter'] = $request->meter;
        $query['customer'] = $request->customer;
        $query['start_time'] = $request->startTime;
        $query['end_time'] = $request->endTime;
        if ($request->startingAfter !== null) {
            $query['starting_after'] = $request->startingAfter;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v2/organizations/" . RawClient::encodePathParam($request->organizationId) . "/stripe/usage/statement",
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
