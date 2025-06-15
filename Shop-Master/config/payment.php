<?php

return [
    'zarinpal' => [
    'merchant_id' => env('ZARINPAL_MERCHANT_ID'),
    'callback_url' => '/payment/verify',
    'server' => 'sandbox',
    'type' => 'gateway',
        ]
    ];
