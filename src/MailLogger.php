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
        $processors = [];

        if (!empty($config['processors']['memory_usage'])) {
            $processors[] = new MemoryUsageProcessor();
        }

        if (!empty($config['processors']['memory_peak'])) {
            $processors[] = new MemoryPeakUsageProcessor();
        }

        if (!empty($config['processors']['web'])) {
            $processors[] = new WebProcessor();
        }

        if (!empty($config['processors']['git'])) {
            $processors[] = new GitProcessor();
        }

        return new \Monolog\Logger(
            getenv('APP_NAME'),
            [
                new MailLoggingHandler($config['from'], $config['to'], $config['subject'], $config['format'], $config['level'])
            ],
            $processors
        );
    }
}
