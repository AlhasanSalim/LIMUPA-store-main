<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'product_image', 'price', 'category_id', 'store_id', 'compare_price', 'status'
    ];

    protected static function booted(){
        static::addGlobalScope('store', function(Builder $builder){
            $user = Auth::user();
             if ($user && $user->store_id){
                $builder->where('store_id', '=', $user->store_id);
             }
        });
    }


    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function store(){
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }


    public function tags(){
        return $this->belongsToMany(
            Tag::class,
            'product_tag',
            'product_id',
            'tag_id',
            'id',
            'id',
        );
    }


    public function getImageUrlAttribute(){
        if (!$this->product_image){
            return 'http://www.newdesignfile.com/postpic/2015/03/change-management-icon_357971.png';
        }
        if (Str::startsWith($this->product_image, ['http://', 'https://'])){
            return $this->product_image;
        }
        return asset('storage/'.$this->product_image);
    }


    public function getSalePercentAttribute(){
        if (!$this->compare_price){
            return 0;
        }
        return round(100 - ($this->price / $this->compare_price * 100), 0);
    }
}
