<?php

namespace AdilaPay;

use AdilaPay\Account\AccountClient;
use AdilaPay\Customers\CustomersClient;
use AdilaPay\Products\ProductsClient;
use AdilaPay\Prices\PricesClient;
use AdilaPay\PaymentIntents\PaymentIntentsClient;
use AdilaPay\Charges\ChargesClient;
use AdilaPay\Refunds\RefundsClient;
use AdilaPay\Checkout\CheckoutClient;
use AdilaPay\PaymentLinks\PaymentLinksClient;
use AdilaPay\PromotionCodes\PromotionCodesClient;
use AdilaPay\Subscriptions\SubscriptionsClient;
use AdilaPay\Invoices\InvoicesClient;
use AdilaPay\BillingPortal\BillingPortalClient;
use AdilaPay\Balance\BalanceClient;
use AdilaPay\BalanceTransactions\BalanceTransactionsClient;
use AdilaPay\Payouts\PayoutsClient;
use AdilaPay\PayoutSettings\PayoutSettingsClient;
use AdilaPay\Disputes\DisputesClient;
use Psr\Http\Client\ClientInterface;
use AdilaPay\Core\Client\RawClient;
use Exception;

class AdilaPayClient
{
    /**
     * @var AccountClient $account
     */
    public AccountClient $account;

    /**
     * @var CustomersClient $customers
     */
    public CustomersClient $customers;

    /**
     * @var ProductsClient $products
     */
    public ProductsClient $products;

    /**
     * @var PricesClient $prices
     */
    public PricesClient $prices;

    /**
     * @var PaymentIntentsClient $paymentIntents
     */
    public PaymentIntentsClient $paymentIntents;

    /**
     * @var ChargesClient $charges
     */
    public ChargesClient $charges;

    /**
     * @var RefundsClient $refunds
     */
    public RefundsClient $refunds;

    /**
     * @var CheckoutClient $checkout
     */
    public CheckoutClient $checkout;

    /**
     * @var PaymentLinksClient $paymentLinks
     */
    public PaymentLinksClient $paymentLinks;

    /**
     * @var PromotionCodesClient $promotionCodes
     */
    public PromotionCodesClient $promotionCodes;

    /**
     * @var SubscriptionsClient $subscriptions
     */
    public SubscriptionsClient $subscriptions;

    /**
     * @var InvoicesClient $invoices
     */
    public InvoicesClient $invoices;

    /**
     * @var BillingPortalClient $billingPortal
     */
    public BillingPortalClient $billingPortal;

    /**
     * @var BalanceClient $balance
     */
    public BalanceClient $balance;

    /**
     * @var BalanceTransactionsClient $balanceTransactions
     */
    public BalanceTransactionsClient $balanceTransactions;

    /**
     * @var PayoutsClient $payouts
     */
    public PayoutsClient $payouts;

    /**
     * @var PayoutSettingsClient $payoutSettings
     */
    public PayoutSettingsClient $payoutSettings;

    /**
     * @var DisputesClient $disputes
     */
    public DisputesClient $disputes;

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
     * @param ?string $apiKey The apiKey to use for authentication.
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        ?string $apiKey = null,
        ?array $options = null,
    ) {
        $apiKey ??= $this->getFromEnvOrThrow('ADILA_PAY_API_KEY', 'Please pass in apiKey or set the environment variable ADILA_PAY_API_KEY.');
        $defaultHeaders = [
            'x-api-key' => $apiKey,
        ];

        $this->options = $options ?? [];

        $this->options['headers'] = array_merge(
            $defaultHeaders,
            $this->options['headers'] ?? [],
        );

        $this->client = new RawClient(
            options: $this->options,
        );

        $this->account = new AccountClient($this->client, $this->options);
        $this->customers = new CustomersClient($this->client, $this->options);
        $this->products = new ProductsClient($this->client, $this->options);
        $this->prices = new PricesClient($this->client, $this->options);
        $this->paymentIntents = new PaymentIntentsClient($this->client, $this->options);
        $this->charges = new ChargesClient($this->client, $this->options);
        $this->refunds = new RefundsClient($this->client, $this->options);
        $this->checkout = new CheckoutClient($this->client, $this->options);
        $this->paymentLinks = new PaymentLinksClient($this->client, $this->options);
        $this->promotionCodes = new PromotionCodesClient($this->client, $this->options);
        $this->subscriptions = new SubscriptionsClient($this->client, $this->options);
        $this->invoices = new InvoicesClient($this->client, $this->options);
        $this->billingPortal = new BillingPortalClient($this->client, $this->options);
        $this->balance = new BalanceClient($this->client, $this->options);
        $this->balanceTransactions = new BalanceTransactionsClient($this->client, $this->options);
        $this->payouts = new PayoutsClient($this->client, $this->options);
        $this->payoutSettings = new PayoutSettingsClient($this->client, $this->options);
        $this->disputes = new DisputesClient($this->client, $this->options);
    }

    /**
     * @param string $env
     * @param string $message
     * @return string
     */
    private function getFromEnvOrThrow(string $env, string $message): string
    {
        $value = getenv($env);
        return $value ? (string) $value : throw new Exception($message);
    }
}
