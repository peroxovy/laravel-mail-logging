This package provides possibility to send an exception to desired e-mail addresses, notifying the administrator about any problems.
___

Installation:

`composer require peroxovy/laravel-mail-logging`

___

Publish config:
```
php artisan vendor:publish --provider="Peroxovy\LaravelMailLogging\Providers\MailLoggingServiceProvider"
```

___

Add the following lines to your `.env`:

```
MAIL_LOG_FROM={email address from}
MAIL_LOG_TO={email addresses divided by "," }
MAIL_LOG_SUBJECT={email subject}
MAIL_LOG_MEMORY_USAGE=true/false
MAIL_LOG_MEMORY_PEAK=true/false
MAIL_LOG_WEB=true/false
MAIL_LOG_GIT=true/false
```

___

Modify `channels` section inside your `config/logging.php` by adding the driver:

```php
'mail' => [
    'driver'    => 'custom',
    'via' => \Peroxovy\LaravelMailLogging\MailLogger::class,
    'from' => env('MAIL_LOG_FROM', 'no-reply@example.com'),
    'to' => explode(',', env('MAIL_LOG_TO', 'admin@example.com')),
    'level' => env('MAIL_LOG_LEVEL', 'error'),
    'subject' => env('MAIL_LOG_SUBJECT', 'This is a subject of a Log'),
    'processors' => [
        'memory_usage' => env('MAIL_LOG_MEMORY_USAGE', true),
        'memory_peak' => env('MAIL_LOG_MEMORY_PEAK', true),
        'web' => env('MAIL_LOG_WEB', true),
        'git' => env('MAIL_LOG_GIT', true),
    ],
],  
```

Activate the package by modifying your default log channel:

```php
'stack' => [
        'driver' => 'stack',
        'channels' => ['daily', 'mail'],
        'ignore_exceptions' => false,
    ],
```