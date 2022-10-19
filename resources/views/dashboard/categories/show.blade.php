@extends('layouts.dashboard')
@section('title', $category->name)
@section('breadcrumb')
  @parent
  <li class="breadcrumb-item active">Categories</li>
  <li class="breadcrumb-item active">{{ $category->name }}</li>    
@endsection
@section('content')
<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Store</th>
            <th>Status</th>
            <th>Craeted At</th>
        </tr>
    </thead>
    <tbody>
        @php
            $products = $category->products->with('store')->latest()->paginate(5);
        @endphp
        @forelse ( $products as $product )
            <tr>
                <td><img src="{{ asset('storage/'.$product->product_image) }}" alt="" height="50"></td>
                <td>{{ $product->name }}</td>
                <!-- SELECT * FROM stores WHERE id = $product->store_id; just at used relation method -->
                <td>{{ $product->store->name }}</td>
                <td>{{ $product->status }}</td>
                <td>{{ $product->created_at }}</td>
            </tr>
        @empty
            <td colspan="5">No products defind.</td>
        @endforelse
    </tbody>
</table>

{{ $products->links() }}
@endsection