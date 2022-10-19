<?php
namespace App\Repositories\Cart;

use Illuminate\Support\Collection;
use App\Models\Product;

// goals of this interface cause if change the resource of data as Session or Model(database) or CSV File, just change implemntion of method and not rewrite of code.

interface CartRepository{

    public function get() : Collection;

    public function add(Product $product, $quantity = 1);

    public function update($id, $quantity);

    public function delete($id);

    public function empty();

    public function total() : float;

}