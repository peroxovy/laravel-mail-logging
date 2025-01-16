<?php

return [
    /*
    |--------------------------------------------------------------------------
    | E-mail nadawcy
    |--------------------------------------------------------------------------
    |
    | Adres e-mail, z którego będą wysyłane logi błędów.
    |
    */
    'from' => env('MAIL_LOG_FROM', 'noreply@example.com'),

    /*
    |--------------------------------------------------------------------------
    | E-mail odbiorców
    |--------------------------------------------------------------------------
    |
    | Lista adresów e-mail, na które będą wysyłane logi błędów.
    |
    */
    'to' => explode(',', env('MAIL_LOG_TO', 'admin@example.com')),

    /*
    |--------------------------------------------------------------------------
    | Temat wiadomości
    |--------------------------------------------------------------------------
    |
    | Domyślny temat wiadomości e-mail z logami błędów.
    |
    */
    'subject' => env('MAIL_LOG_SUBJECT', 'Application Error Log'),

    /*
    |--------------------------------------------------------------------------
    | Format wiadomości
    |--------------------------------------------------------------------------
    |
    | Format treści wiadomości: 'plain' lub 'html'.
    |
    */
    'format' => env('MAIL_LOG_FORMAT', 'plain'),
];
