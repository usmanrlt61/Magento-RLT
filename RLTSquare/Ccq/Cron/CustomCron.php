<?php

namespace RLTSquare\Ccq\Cron;

use Psr\Log\LoggerInterface;

/**
 * package to run custom cron job
 */
class CustomCron
{
    /**
     * @var LoggerInterface
     */
    protected LoggerInterface $logger;

    /**
     * @param LoggerInterface $logger
     */

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Write to system.log
     *
     * @return void
     */
    public function execute(): void
    {
        $this->logger->info('hello world from rltsquare_hello_world cron job');
    }
}
