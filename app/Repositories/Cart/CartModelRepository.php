<?php 
namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;


//Repository design pattern


class CartModelRepository implements CartRepository{

    protected $items;

    public function __construct()
    {
        // collect() for convert from array to Collection(object in laravel)
        $this->items = collect();
    }

    public function get() : Collection
    {
        // this steps for make sql query for once in one request.
        if ( !$this->items->count() ){
            $this->items = Cart::with('product')->get();
        }
        return $this->items;
    }

   public function add(Product $product, $quantity = 1)
    {
        $item = Cart::where('product_id', '=', $product->id)
        ->first();
        
        if ( !$item ) {
            $cart = Cart::create([
                // id => observer(event) fill this field in database automatic at use insert of database.
                // cookie_id => observer(event) fill this field in database automatic at use insert of database.
                'user_id'   => Auth::user(),
                'product_id'=> $product->id,
                'quantity'  => $quantity,
            ]);
            $this->get()->push($cart);
            return $cart;
        }

        return $item->increment('quantity', $quantity);
    }

   public function update($id, $quantity)
   {
        Cart::where('id', '=', $id)
            ->update([
                'quantity' => $quantity
        ]);
   }

   public function delete($id)
   {
        Cart::where('id', '=', $id)
        ->delete();
   }

   public function empty()
   {
        // query() return object from Builder class from this model it is considered sql syntax which execution;
        Cart::query()->delete();
   }

   public function total() : float
   {
        /*
            return (float) Cart::where('cookie_id', '=', $this->getCookieId())
                ->join('products', 'products.id', '=', 'carts.product_id')
                // selectRaw() for write new pure sql query syntax.
                ->selectRaw('SUM(products.price * carts.quantity) as total')
                ->value('total');
        */    

        return $this->get()->sum(function(Cart $item){
            // sum override function in Collection obj take closure function casue sum operation between two fields in two tables.
            // $item in closure parameter is index of collection.
            return $item->quantity * $item->product->price;
        }); 
   }  
}