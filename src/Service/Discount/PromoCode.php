<?php

declare(strict_types = 1);

namespace Service\Discount;

class PromoCode extends Discount
{

    /**
     * @inheritdoc
     */
    public function getDiscount(): float
    {
        parent::getDiscount();
        return 5.50;
    }
}
