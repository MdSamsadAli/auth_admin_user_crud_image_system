@extends('layouts.admin.layout')
@section('content')
    
        <div>
            <h1 class="text-center mt-4">
                All Users
            </h1>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
            <a href="{{ route('admin.trash') }}" class="btn btn-primary">Go to Trash</a>

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
                <td>{{ $item->role == '0' ? 'User':'Admin' }}</td>
                <td>
                    <a href="{{ route('admin.useredit', $item->id) }}" class="btn btn-secondary">Edit</a>
                    <a href="{{ route('admin.userdelete', $item->id) }}" class="btn btn-danger">Trash</a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
@endsection
    