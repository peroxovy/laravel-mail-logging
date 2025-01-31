<?php

namespace Peroxovy\LaravelMailLogging;

use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Peroxovy\LaravelMailLogging\Mail\LogMailMailable;

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
        Mail::raw($message, function (Message $m){
            $m->subject($this->subject)->to($this->to)->from($this->from);
        });
    }
}
