<?php

return [
    // Chave de API da organização. Use somente no servidor.
    'api_key' => env('ADILA_PAY_API_KEY'),

    // Deixe vazio para usar https://api-pay.adila.co.
    'base_url' => env('ADILA_PAY_BASE_URL'),

    // Organização usada nas rotas /v2/organizations/{organizationId}.
    'organization_id' => env('ADILA_PAY_ORGANIZATION_ID'),

    // Segundos por tentativa. Exige Guzzle ou Symfony HttpClient (o Laravel inclui Guzzle).
    'timeout' => (float) env('ADILA_PAY_TIMEOUT', 30),

    // Novas tentativas em 408, 429 e 5xx. Mutações repetem a mesma Idempotency-Key.
    'max_retries' => (int) env('ADILA_PAY_MAX_RETRIES', 2),
];
