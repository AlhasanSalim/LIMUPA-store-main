@extends('layouts.dashboard')
@section('title', 'Trashed Categories')
@section('breadcrumb')
  @parent
  <li class="breadcrumb-item">Categories</li>
  <li class="breadcrumb-item active">Trash</li>    
@endsection
@section('content')

<div class="mb-5">
    <a class="btn btn-sm btn-outline-primary" href="{{ route('dashboard.categories.index') }}">
        Back
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
            <th>Status</th>
            <th>Deleted At</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category)
            <tr>
                <td><img src="{{ asset('storage/'.$category->category_image) }}" alt="" height="50"></td>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->status }}</td>
                <td>{{ $category->delete_at }}</td>

                <td>
                    <form action="{{ route('dashboard.categories.restore', $category->id) }}" method="post">
                        @csrf
                        <!-- Form Method Spoofing -->
                        <input type="hidden" name="_method" value="put">
                        <!-- or using directive bt @method('delete/put/patch')-->
                        <button type="submit" class="btn btn-sm btn-outline-info">restore</button>
                    </form>
                </td>


                <td>
                    <form action="{{ route('dashboard.categories.force-delete', $category->id) }}" method="post">
                        @csrf
                        <!-- Form Method Spoofing -->
                        <input type="hidden" name="_method" value="delete">
                        <!-- or using directive bt @method('delete/put/patch')-->
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <td colspan="7">No Categories defind.</td>
        @endforelse
    </tbody>
</table>

{{ $categories->withQueryString()->links() }}
    
@endsection