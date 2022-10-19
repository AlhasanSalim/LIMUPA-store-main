<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Facades\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmptyCart
{
    public function handle( $event )
    {
        Cart::empty();
    }
}
