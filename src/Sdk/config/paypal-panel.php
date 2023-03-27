<?php
return [
    // Client ID app
    'client_id' => env('PAYPAL_CLIENT_ID'),
    // Secret app
    'secret' => env('PAYPAL_SECRET'),
    'settings' => [
        // PayPal mode, sanbox or live
        'mode' => env('PAYPAL_MODE'),
        'http.ConnectionTimeOut' => 120,
        'log.logEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ],
];