<?php

return [
    /*
    |--------------------------------------------------------------------------
    | E-mail author
    |--------------------------------------------------------------------------
    |
    | Address from where e-mails would be sent. It is not the host.
    |
    */
    'from' => env('MAIL_LOG_FROM', 'noreply@example.com'),

    /*
    |--------------------------------------------------------------------------
    | E-mail recipients
    |--------------------------------------------------------------------------
    |
    | The list of e-mail recipients.
    |
    */
    'to' => explode(',', env('MAIL_LOG_TO', 'admin@example.com')),

    /*
    |--------------------------------------------------------------------------
    | Message subject
    |--------------------------------------------------------------------------
    |
    | Default e-mail subject with exception log.
    |
    */
    'subject' => env('MAIL_LOG_SUBJECT', 'Application Error Log'),

    /*
    |--------------------------------------------------------------------------
    | Message format
    |--------------------------------------------------------------------------
    |
    | Default format of the message - currently supported : plain
    |
    */
    'format' => env('MAIL_LOG_FORMAT', 'plain'),

    /*
    |--------------------------------------------------------------------------
    | Log processors
    |--------------------------------------------------------------------------
    |
    | Determines if use logging processors.
    |
    */
    'processor_memory_usage' => env('MAIL_LOG_MEMORY_USAGE', true),
    'processor_memory_peak' => env('MAIL_LOG_MEMORY_PEAK', true),
    'processor_web' => env('MAIL_LOG_WEB', true),
    'processor_git' => env('MAIL_LOG_GIT', true),


];
