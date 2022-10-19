<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        //
    }

    public function show(Product $product){
        
        if ($product->status != 'active'){
            abort(404);
        }

        $products = Product::with('category')->where('category_id', '=', $product->category->id)->limit(50)->get();
       
        return view('front.products.show', compact(['product', 'products']));
    }
}
