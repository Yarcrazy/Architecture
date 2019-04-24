<?php

namespace Service\Order;


class Checkout
{
    private $discount;
    private $billing;
    private $security;
    private $communication;
    private $products;

    public function __construct(BasketBuilder $basket)
    {
        $this->discount = $basket->getDiscount();
        $this->billing = $basket->getBilling();
        $this->security = $basket->getSecurity();
        $this->communication = $basket->getCommunication();
        $this->products = $basket->getProducts();
    }

    /**
     * Проведение всех этапов заказа
     *
     * @return void
     */
    public function checkoutProcess(): void {
        $totalPrice = 0;
        foreach ($this->products as $product) {
            $totalPrice += $product['price'];
        }

        $totalPrice = $totalPrice - $totalPrice / 100 * $this->discount->getDiscount();

        $this->billing->pay($totalPrice);

        $user = $this->security->getUser();
        $this->communication->process($user, 'checkout_template');
    }
}