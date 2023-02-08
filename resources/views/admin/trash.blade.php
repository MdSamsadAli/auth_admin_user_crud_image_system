@extends('layouts.admin.layout')
@section('content')
    
        <div>
            <h1 class="text-center mt-4">
                All Users
            </h1>
            <a href="{{ route('admin.all') }}" class="btn btn-primary">Go to User List</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">FullName</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)

            <tr>
                <td>{{ $item->fullName }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->role }}</td>
                <td>
                    <a href="{{ route('admin.restore', $item->id) }}" class="btn btn-danger">Restore</a>
                    <a href="{{ route('admin.forceDelete', $item->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
@endsection
    