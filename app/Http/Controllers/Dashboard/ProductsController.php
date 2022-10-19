<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'store'])->paginate();
        return view('dashboard.products.index', compact('products'));
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $tags = implode(',', $product->tags()->pluck('name')->toArray());

        return view('dashboard.products.edit', compact('product', 'tags'));
    }


    public function update(Request $request, Product $product)
    {

        $product->update($request->except('tags'));

        $tags = json_decode($request->post('tags'));

        $tag_ids = [];

        $saved_tags = Tag::all();

        foreach ($tags as $item){
            $slug = Str::slug($item->value);
            $tag = $saved_tags->where('slug','=', $slug)->first();
            if (!$tag){
                $tag = Tag::create([
                    'name' => $item->value,
                    'slug' => $slug
                ]);
            }

            $tag_ids[] = $tag->id;
        }

        $product->tags()->sync($tag_ids);

        return redirect()->route('dashboard.products.index')->with('success', 'Product Updated!');
    }
}
