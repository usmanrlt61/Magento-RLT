<?php

declare(strict_types=1);

namespace RLTSquare\Unit3\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use RLTSquare\Unit3\Helper\Data;

/**
 * class UnitBlock
 */
class UnitBlock extends Template
{
    /**
     * @var Data
     */
    private Data $helper;

    private $encryptor;

    /**
     * @param Context $context
     * @param Data $helper
     */
    public function __construct(
        Context $context,
        Data    $helper,
        \Magento\Framework\Encryption\EncryptorInterface $encryptor,
    ) {
        $this->helper = $helper;
        $this->encryptor = $encryptor;
        parent::__construct($context);
    }

    /**
     * @return string
     * Get username from system configurations
     */
    public function getUserName(): string
    {
        return $this->helper->getUserName();
    }

    /**
     * @return string
     * Get user password from system configurations
     */
    public function getUserPassword(): string
    {
        $password = $this->helper->getUserPassword();
        return $this->encryptor->decrypt($password);
    }

    /**
     * @return string
     * Get environment type from system configurations
     */
    public function getEnvironmentType(): string
    {
        return $this->helper->getEnvironmentType();
    }
}
