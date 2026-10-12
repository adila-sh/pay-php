# Adila Pay para PHP e Laravel

Cliente PHP gerado a partir do contrato financeiro Adila Pay. Suporta PHP 8.1+
com qualquer cliente HTTP PSR-18 e se integra ao Laravel sem configuração extra.

## Instalação

```bash
composer require adila-sh/pay
```

Fora do Laravel, instale também um cliente PSR-18, como `guzzlehttp/guzzle`.
O timeout por requisição exige Guzzle ou Symfony HttpClient.

## Uso no servidor

```php
use AdilaPay\AdilaPayClient;
use AdilaPay\Customers\Requests\CreateCustomersRequest;
use AdilaPay\Customers\Requests\ListCustomersRequest;

$client = new AdilaPayClient(getenv('ADILA_PAY_API_KEY'), [
    'timeout' => 30,
    'maxRetries' => 2,
]);

$customers = $client->customers->list(new ListCustomersRequest([
    'organizationId' => getenv('ADILA_PAY_ORGANIZATION_ID'),
    'limit' => 10,
]));

$customer = $client->customers->create(new CreateCustomersRequest([
    'organizationId' => getenv('ADILA_PAY_ORGANIZATION_ID'),
    'idempotencyKey' => 'cliente-integracao-001',
    'name' => 'Cliente de exemplo',
]));
```

A URL padrão é `https://api-pay.adila.co`; use a opção `baseUrl` para outra
instalação. Sem `$apiKey`, o cliente lê `ADILA_PAY_API_KEY` do ambiente.

## Laravel

O pacote registra sozinho o `AdilaPayServiceProvider` e o facade `AdilaPay`.
Configure o `.env`:

```dotenv
ADILA_PAY_API_KEY=...
ADILA_PAY_ORGANIZATION_ID=...
```

Use o facade ou injete `AdilaPayClient`, que é um singleton no container:

```php
use AdilaPay\AdilaPayClient;
use AdilaPay\Customers\Requests\ListCustomersRequest;
use AdilaPay\Laravel\Facades\AdilaPay;

$customers = AdilaPay::customers()->list(new ListCustomersRequest([
    'organizationId' => config('adila-pay.organization_id'),
]));

class CheckoutController
{
    public function __construct(private AdilaPayClient $adilaPay) {}
}
```

Para alterar `base_url`, `timeout` ou `max_retries`, publique a configuração:

```bash
php artisan vendor:publish --tag=adila-pay-config
```

## Erros, listas e idempotência

Respostas HTTP de erro lançam `AdilaPay\Exceptions\AdilaPayApiException`, com
`getCode()` igual ao status e `getBody()` com o corpo. Falhas de rede e timeouts
lançam `AdilaPay\Exceptions\AdilaPayException`.

São 43 operações financeiras, incluindo links de pagamento, códigos promocionais
e configuração de repasses. Criação de conta, onboarding e cadastro humano ficam
fora do cliente de integração. As requisições são tipadas; respostas Stripe
continuam abertas como arrays. Nas listas, use `$list->data`, `$list->hasMore`
e `startingAfter`. Mutações exigem chave de idempotência de 8 a 255 caracteres.
Reutilize a mesma chave e corpo somente para repetir a mesma operação lógica.

Consulte [a documentação](https://docs.adila.co/sdk) para recursos e limites de
ambiente. Este pacote inclui `openapi.json` e `provenance.json` para identificar
o contrato utilizado na geração. O código é gerado em
`adila-sh/payment-sdks`; alterações feitas diretamente neste repositório são
sobrescritas na próxima versão.
