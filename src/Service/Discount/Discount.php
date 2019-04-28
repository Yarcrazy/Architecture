<?php

namespace Service\Discount;

class Discount implements IDiscount
{

    protected $discount;

    public function __construct(IDiscount $discount)
    {
        $this->discount = $discount;
    }

    /**
     * Получаем скидку в процентах
     *
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->discount->getDiscount();
    }
}