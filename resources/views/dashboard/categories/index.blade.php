@extends('layouts.dashboard')
@section('title', 'Categories')
@section('breadcrumb')
  @parent
  <li class="breadcrumb-item active">Categories</li>    
@endsection
@section('content')

<div class="mb-5">
    <a class="btn btn-sm btn-outline-primary mr-2" href="{{ route('dashboard.categories.create') }}">
        Create
    </a>

    <a class="btn btn-sm btn-outline-dark" href="{{ route('dashboard.categories.trash') }}">
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
            <th>Parent</th>
            <th>Products #</th>
            <th>Status</th>
            <th>Craeted At</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category)
            <tr>
                <td><img src="{{ asset('storage/'.$category->category_image) }}" alt="" height="50"></td>
                <td>{{ $category->id }}</td>
                <td><a href="{{ route('dashboard.categories.show', $category) }}">{{ $category->name }}</a></td>
                <td>{{ $category->parent->name }}</td>
                <td>{{ $category->products_count}}</td>
                <td>{{ $category->status }}</td>
                <td>{{ $category->created_at }}</td>
                <td>
                    <a href="{{ route('dashboard.categories.edit', $category->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                </td>
                <td>
                    <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="post">
                        @csrf
                        <!-- Form Method Spoofing -->
                        <input type="hidden" name="_method" value="delete">
                        <!-- or using directive bt @method('delete/put/patch')-->
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <td colspan="9">No Categories defind.</td>
        @endforelse
    </tbody>
</table>

{{ $categories->withQueryString()->links() }}
    
@endsection