<?php

namespace Peroxovy\LaravelMailLogging;

use Monolog\Processor\GitProcessor;
use Monolog\Processor\MemoryPeakUsageProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Processor\WebProcessor;
use Peroxovy\LaravelMailLogging\Handlers\MailLoggingHandler;

class MailLogger
{
    public function __invoke(array $config)
    {
        return new \Monolog\Logger(
            getenv('APP_NAME'), 
            [ 
                new MailLoggingHandler($config['from'], $config['to'], $config['subject'], $config['format']) 
            ], 
            [
                new MemoryUsageProcessor(), 
                new MemoryPeakUsageProcessor(), 
                new WebProcessor(), 
                new GitProcessor()
            ]);
    }
}