<?php

declare(strict_types = 1);

namespace Service\Discount;

class VipDiscount extends Discount
{

    /**
     * @inheritdoc
     */
    public function getDiscount(): float
    {
        parent::getDiscount();
        return 20;
    }
}
