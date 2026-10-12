<?php

namespace AdilaPay\Laravel\Facades;

use AdilaPay\AdilaPayClient;
use Illuminate\Support\Facades\Facade;

/**
 * Acesso aos recursos do AdilaPayClient: AdilaPay::customers()->list(...).
 *
 * @method static \AdilaPay\Account\AccountClient account()
 * @method static \AdilaPay\Customers\CustomersClient customers()
 * @method static \AdilaPay\Products\ProductsClient products()
 * @method static \AdilaPay\Prices\PricesClient prices()
 * @method static \AdilaPay\PaymentIntents\PaymentIntentsClient paymentIntents()
 * @method static \AdilaPay\Charges\ChargesClient charges()
 * @method static \AdilaPay\Refunds\RefundsClient refunds()
 * @method static \AdilaPay\Checkout\CheckoutClient checkout()
 * @method static \AdilaPay\PaymentLinks\PaymentLinksClient paymentLinks()
 * @method static \AdilaPay\PromotionCodes\PromotionCodesClient promotionCodes()
 * @method static \AdilaPay\Subscriptions\SubscriptionsClient subscriptions()
 * @method static \AdilaPay\Invoices\InvoicesClient invoices()
 * @method static \AdilaPay\BillingPortal\BillingPortalClient billingPortal()
 * @method static \AdilaPay\Balance\BalanceClient balance()
 * @method static \AdilaPay\BalanceTransactions\BalanceTransactionsClient balanceTransactions()
 * @method static \AdilaPay\Payouts\PayoutsClient payouts()
 * @method static \AdilaPay\PayoutSettings\PayoutSettingsClient payoutSettings()
 * @method static \AdilaPay\Disputes\DisputesClient disputes()
 *
 * @see AdilaPayClient
 */
class AdilaPay extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return AdilaPayClient::class;
    }

    /**
     * Os recursos do cliente são propriedades; o facade os expõe como métodos.
     *
     * @param string $method
     * @param array<mixed> $args
     * @return mixed
     */
    public static function __callStatic($method, $args)
    {
        $client = static::getFacadeRoot();
        if ($args === [] && $client instanceof AdilaPayClient && array_key_exists($method, get_object_vars($client))) {
            return $client->{$method};
        }

        return parent::__callStatic($method, $args);
    }
}
