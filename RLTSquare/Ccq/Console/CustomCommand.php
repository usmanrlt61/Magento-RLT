<?php

namespace RLTSquare\Ccq\Console;

use Magento\Framework\MessageQueue\PublisherInterface;
use Psr\Log\LoggerInterface;
use RLTSquare\Ccq\Api\Data\CustomDataInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CustomCommand extends Command
{
    const VAR1_ARGUMENT = "var1";
    const VAR2_ARGUMENT = "var2";

    /**
     * @var PublisherInterface
     */
    protected $publisher;
    /**
     * @var CustomDataInterface
     */
    protected $customData;
    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct(
        LoggerInterface     $logger,
        CustomDataInterface $customData,
        PublisherInterface  $publisher,
        $data = null
    ) {
        parent::__construct($data);
        $this->publisher = $publisher;
        $this->customData = $customData;
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(
        InputInterface  $input,
        OutputInterface $output
    ) {
        $var1 = $input->getArgument(self::VAR1_ARGUMENT);
        $var2 = $input->getArgument(self::VAR2_ARGUMENT);
        $output->writeln($var1 . ' ' . $var2);
        $this->customData->setVar1($var1);
        $this->customData->setVar2([$var2]);
        $this->publisher->publish('rltsquare', $this->customData);
        $this->logger->debug('hello world from rltsquare_hello_world queue job');
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName("rltsquare:hello:world");
        $this->setDescription("custom cli command");
        $this->setDefinition([
            new InputArgument(self::VAR1_ARGUMENT, InputArgument::OPTIONAL, "Var1"),
            new InputArgument(self::VAR2_ARGUMENT, InputOption::VALUE_REQUIRED, "Var2")
        ]);
        parent::configure();
    }
}
