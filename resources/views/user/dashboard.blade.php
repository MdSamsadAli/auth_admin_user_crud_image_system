@extends('layouts.admin.layout')
@section('content')
    
        <div>

            @if (auth()->check())
            <div class="mt-4">
                <h4>{{ auth()->user()->fullName }}</h4>

            </div>
            <a href="{{ route('auth.logout') }}" class="btn btn-primary">Logout</a>
            @endif
            <h1 class="text-center mt-4">
                User Dashboard
            </h1>
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
                    <a href="" class="btn btn-info">View</a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
@endsection
    