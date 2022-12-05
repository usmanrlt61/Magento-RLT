<?php declare(strict_types=1);


namespace RLTSquare\Ccq\Model\Queue;

use RLTSquare\Ccq\Api\Data\CustomDataInterface;

class CustomData implements CustomDataInterface
{

    /**
     * @var mixed
     */
    protected $var1;


    /**
     * @var mixed
     */
    protected $var2;

    /**
     * @inheritDoc
     */
    public function getVar1(): mixed
    {
        return $this->var1;
    }

    /**
     * @inheritDoc
     */
    public function setVar1(mixed $var1): void
    {
        $this->var1 = $var1;
    }

    /**
     * @inheritDoc
     */
    public function getVar2(): mixed
    {
        return $this->var2;
    }

    /**
     * @inheritDoc
     */
    public function setVar2(mixed $var2): void
    {
        $this->var2 = $var2;
    }
}
