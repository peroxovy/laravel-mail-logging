<?php

namespace Peroxovy\LaravelMailLogging\Facades;

use Illuminate\Support\Facades\Facade;

class MailLogging extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'MailLogging';
    }
}