<?php

namespace Peroxovy\LaravelMailLogging;

use Illuminate\Support\Facades\Mail;

class MailLoggingSender
{
    protected string $from;
    protected array $to;
    protected string $subject;
    protected string $format;

    public function __construct(string $from, array $to, string $subject = 'Application Error Log', string $format = 'plain')
    {
        $this->from = $from;
        $this->to = $to;
        $this->subject = $subject;
        $this->format = $format;
    }

    public function send(string $message, array $context = []): void
    {
        $emailContent = $this->prepareContent($message, $context);

        Mail::send([], [], function ($mail) use ($emailContent) {
            $mail->from($this->from)
                 ->to($this->to)
                 ->subject($this->subject)
                 ->setBody($emailContent, $this->format === 'html' ? 'text/html' : 'text/plain');
        });
    }

    protected function prepareContent(string $message, array $context): string
    {
        if ($this->format === 'html') {
            return $this->prepareHtmlContent($message, $context);
        }

        return $this->preparePlainContent($message, $context);
    }

    protected function prepareHtmlContent(string $message, array $context): string
    {
        $contextHtml = $this->formatContext($context, 'html');
        return "<h1>Error Log</h1><p>{$message}</p><h2>Context:</h2><pre>{$contextHtml}</pre>";
    }

    protected function preparePlainContent(string $message, array $context): string
    {
        $contextPlain = $this->formatContext($context, 'plain');
        return "Error Log\n\n{$message}\n\nContext:\n{$contextPlain}";
    }

    protected function formatContext(array $context, string $format): string
    {
        $formatted = print_r($context, true);
        return $format === 'html' ? htmlspecialchars($formatted) : $formatted;
    }
}
