<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        // with method() for Eager loading by relation "category" at Product model

        $products = Product::With('category')->where('status', '=', 'active')
        ->limit(50)
        ->get();


        $productsOthers = Product::With('category')->where('status', '=', 'active')
        ->limit(50)
        ->get();
        return view('front.home', compact(['products', 'productsOthers']));
    }
    
}
