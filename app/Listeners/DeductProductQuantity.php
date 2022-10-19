<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Facades\Cart;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Throwable;

class DeductProductQuantity
{
    public function handle(OrderCreated $event)
    {
        $order = $event->order;

        try{

            foreach( $order->products as $product ) {
                $product->decrement('quantity', $product->orderItem->quantity);
            }

        } catch(Throwable $e) {

        }

    }
}
