@extends('layouts.dashboard')
@section('title', 'Products')
@section('breadcrumb')
  @parent
  <li class="breadcrumb-item active">Products</li>    
@endsection
@section('content')

<div class="mb-5">
    <a class="btn btn-sm btn-outline-primary mr-2" href="{{ route('dashboard.products.create') }}">
        Create
    </a>

    <a class="btn btn-sm btn-outline-dark" href="#">
        Trash
    </a>
</div>

<x-alert />

<form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between">
    <x-form.input name="name" type="text" placeholder="Search" :value="request('name')"/> 
    <br>
    <select name="status" class="form-control" style="width: 150px">
        <option value="">All</option>
        <option value="active" @if (request('status') == 'active') selected @endif>Active</option>
        <option value="archived" @if (request('status') == 'archived') selected @endif>Archived</option>
    </select>
    <button class="btn btn-dark">Filter</button>
</form>

<br>
<br>

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Store</th>
            <th>Status</th>
            <th>Craeted At</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $product)
            <tr>
                <td><img src="{{ asset('storage/'.$product->product_image) }}" alt="" height="50"></td>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <!-- SELECT * FROM categories WHERE id = $product->categroy_id; just at used relation method-->
                <td>{{ $product->category->name }}</td>
                <!-- SELECT * FROM stores WHERE id = $product->store_id; just at used relation method -->
                <td>{{ $product->store->name }}</td>
                <td>{{ $product->status }}</td>
                <td>{{ $product->created_at }}</td>
                <td>
                    <a href="{{ route('dashboard.products.edit', $product->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                </td>
                <td>
                    <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="post">
                        @csrf
                        <!-- Form Method Spoofing -->
                        <input type="hidden" name="_method" value="delete">
                        <!-- or using directive bt @method('delete/put/patch')-->
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <td colspan="7">No products defind.</td>
        @endforelse
    </tbody>
</table>

{{ $products->withQueryString()->links() }}
    
@endsection