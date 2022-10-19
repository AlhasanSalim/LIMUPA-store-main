<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id', 'user_id', 'payment_method', 'status', 'payment_status'
    ];

    public function store(){
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault([
            'name' => 'Guast Customer'
        ]);
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id', 'id', 'id')
                ->using(OrderItem::class)
                ->as('orderItem')
                ->withPivot([
                    'product_name',
                    'price',
                    'quantity',
                    'option'
                ]);
    }

    public function addresses(){
        return $this->hasMany(OrderAddress::class, 'order_id', 'id');
    }

    public function billingAddress(){
        return $this->hasOne(OrderAddress::class, 'order_id', 'id')->where('type', '=', 'billing'); // return Model.
    }

    public function shippingAddress(){
        return $this->hasOne(OrderAddress::class, 'order_id', 'id')->where('type', '=', 'shipping');
    }

    protected static function booted(){
        static::creating( function( Order $order ){
            $order->number = Order::getOrderNumber();
        });
    }

    public static function getOrderNumber(){
        $year = Carbon::now()->year;
        $number = Order::whereYear('created_at', '=', $year)->max('number');

        if ($number){
            return $number + 1;
        }
        return $year . '0001';
    }
}
