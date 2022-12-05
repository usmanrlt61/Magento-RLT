<?php

declare(strict_types=1);

namespace RLTSquare\Ccq\Api\Data;

interface CustomDataInterface
{
    /**
     * @param mixed $var1
     *  * @return void
     */
    public function setVar1(mixed $var1): void;

    /**
     * @param mixed $var2
     *  * @return void
     */
    public function setVar2(mixed $var2): void;

    /**
     * @return mixed
     */
    public function getVar1(): mixed;


    /**
     * @return mixed
     */
    public function getVar2(): mixed;


}
