<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class OtherProductController extends Controller
{
    public function index(){
        //
    }

    
    public function show(Product $product){
        return view('front.other_product.show', compact('product'));
    }
}
