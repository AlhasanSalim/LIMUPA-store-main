<?php

namespace App\View\Components;

use App\Facades\Cart;
use Illuminate\View\Component;

class CartMenu extends Component
{

    public $items;
    public $total;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Cart is Facade class for easier use.
        $this->items = Cart::get();
        $this->total = Cart::total();
    }



    // public function __construct(CartRepository $cart)
    // {
    //     // Without facade class but in component system can you may require any variable exists in service container and passed in input argument of component constractur.
    //     $this->items = $cart->get();
    //     $this->total = $cart->total();
    // }




    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cart-menu');
    }
}
