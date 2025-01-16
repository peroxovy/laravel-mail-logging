<?php

namespace Peroxovy\LaravelMailLogging\Handlers;

class MailLoggingHandler extends \Monolog\Handler\AbstractProcessingHandler
{
    protected MailLoggingSender $sender;

    public function __construct(string $from, array $to, string $subject = 'Application Error Log', string $format = 'plain')
    {
        parent::__construct(\Monolog\Logger::toMonologLevel($lvl));
        $this->sender = new MailLoggingSender($from, $to, $subject, $format);
    }

    protected function write(array $record): void
    {
        $message = $record['message'] ?? '';
        $context = $record['context'] ?? [];

        $this->sender->send($message, $context);
    }
}