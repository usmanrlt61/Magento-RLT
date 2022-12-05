<?php

declare(strict_types=1);

namespace RLTSquare\Ccq\Model\Queue;

use Psr\Log\LoggerInterface;

class Consumer
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function processMessage()
    {
        $this->logger->debug('Processed queue message...');
    }
}
