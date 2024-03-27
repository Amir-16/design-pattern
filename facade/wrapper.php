<?php

require_once "Facade/Cart.php";

require_once "Facade/Order.php";

require_once "Facade/Payment.php";

require_once "Facade/Shipping.php";

class CustomerFacade
{
    public $cart;

    public $order;

    public $payment;

    public $shipping;

    public $totalAmount;

    public function __construct()
    {
        $this->cart = new Cart;
        $this->order = new Order;
        $this->payment = new Payment;
        $this->shipping = new Shipping;
    }

    public function addToCart($products)
    {
       return $this->cart->addProducts($products);
    }

    public function checkout()
    {
        $products = $this->cart->getProducts();

        $this->totalAmount = $this->order->process($products);
    }

    public function makePayment()
    {
        $charge = $this->shipping->calculateCharge();
        $this->payment->charge($charge);

        $isCompleted = $this->payment->makePayment();

        if ($isCompleted) {
            $this->shipping->shipProducts();
        }
    }
}

$customer = new CustomerFacade;

$products = [
    [
        'name' => 'Polo T-Shirt',
        'price' => 40,
    ],
    [
        'name' => 'Smart Watch',
        'price' => 400,
    ],
];

$customer->addToCart($products);

$customer->checkout();
$customer->makePayment();