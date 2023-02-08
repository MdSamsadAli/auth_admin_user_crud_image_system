@extends('layouts.admin.layout')
@section('content')
    
        <div>
            @if (auth()->check())
            <div class="mt-4">
                <h4>{{ auth()->user()->fullName }}</h4>
                <h6><a href="{{ route('auth.logout') }}" class="btn btn-primary">Logout</a></h6>
            </div>
            @endif
            <h1 class="text-center mt-4">
                Admin Dashboard
            </h1>
            <a href="{{ route('admin.create') }}" class="btn btn-primary mb-2 mt-4">Add More Product</a>
            <a href="{{ route('admin.all') }}" class="btn btn-primary mb-2 mt-4">User List</a>
        </div>
        <table class="table">
            <thead>
                    
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)

            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>
                    <img src="{{ asset('blog/images/'.$item->image) }}" alt="" width="100" height="100" /></td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    <a href="{{ route('admin.edit', $item->id) }}" class="btn btn-secondary">Edit</a>
                    <a href="" class="btn btn-info">View</a>
                    <a href="{{ route('admin.destroy', $item->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
@endsection
    