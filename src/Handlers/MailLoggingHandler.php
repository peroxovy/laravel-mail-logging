<?php

namespace Peroxovy\LaravelMailLogging\Handlers;

use Peroxovy\LaravelMailLogging\MailLoggingSender;

class MailLoggingHandler extends \Monolog\Handler\AbstractProcessingHandler
{
    protected MailLoggingSender $sender;

    public function __construct(string $from, array $to, string $subject = 'Application Error Log', string $level = 'error')
    {
        parent::__construct(\Monolog\Logger::toMonologLevel($level));
        $this->sender = new MailLoggingSender($from, $to, $subject);
    }

    protected function write($record): void
    {
        $message = $record['formatted'] ?? '';
        $context = $record['context'] ?? [];

        $this->sender->send($message, $context);
    }
}
