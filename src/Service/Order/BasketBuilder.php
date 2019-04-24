<?php

declare(strict_types = 1);

namespace Service\Order;

use Model;
use Service\Billing\Card;
use Service\Billing\IBilling;
use Service\Communication\Email;
use Service\Communication\ICommunication;
use Service\Discount\IDiscount;
use Service\Discount\NullObject;
use Service\User\ISecurity;
use Service\User\Security;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class BasketBuilder
{

    private $discount;
    private $billing;
    private $security;
    private $communication;
    private $products;

    /**
     * @param mixed $discount
     * @return BasketBuilder
     */
    public function setDiscount($discount): BasketBuilder
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @param mixed $billing
     * @return BasketBuilder
     */
    public function setBilling($billing): BasketBuilder
    {
        $this->billing = $billing;
        return $this;
    }

    /**
     * @param mixed $security
     * @return BasketBuilder
     */
    public function setSecurity($security): BasketBuilder
    {
        $this->security = $security;
        return $this;
    }

    /**
     * @param mixed $communication
     * @return BasketBuilder
     */
    public function setCommunication($communication): BasketBuilder
    {
        $this->communication = $communication;
        return $this;
    }

    /**
     * @return Checkout
     */

    public function build() {
        return new Checkout($this);
    }

    /**
     * @param mixed $products
     * @return BasketBuilder
     */
    public function setProducts($products): BasketBuilder
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @return mixed
     */
    public function getBilling()
    {
        return $this->billing;
    }

    /**
     * @return mixed
     */
    public function getCommunication()
    {
        return $this->communication;
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @return mixed
     */
    public function getSecurity()
    {
        return $this->security;
    }
}
