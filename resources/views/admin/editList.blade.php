@extends('layouts.admin.layout')
@section('content')

<div class="text-center">
    <h1 class="mt-4 mb-4"> 
        Update Users Here
    </h1>
</div>
<form action="{{ route('admin.userupdate', $users->id) }}" method="POST" class="w-600">
    @csrf
    <div class="col-8">
        <div class="mb-3">
            <label class="form-label" for="image">First Name</label>
            <input type="text" class="form-control" name="first_name" value="{{ $users->first_name }}">
            {{-- <strong class="form-text">We'll never share your email with anyone else.</strong> --}}
        </div>
        <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" class="form-control" name="last_name" value="{{ $users->last_name }}">
            {{-- <strong class="form-text">We'll never share your email with anyone else.</strong> --}}
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $users->email }}">
            {{-- <strong class="form-text">We'll never share your email with anyone else.</strong> --}}
        </div>
        <div class="mb-3">
            <label class="form-label">Role</label>
            {{-- <select name="role">
                @foreach ($users as $item)
                    <option name="role" value="{{ $item->id }}"
                        @if ($item->id)
                        {{ "selected" }}
                        @endif
                        >
                        {{ $item->role }}
                    </option>
                @endforeach
            </select> --}}
            <input type="text" class="form-control" name="role" value="{{ $users->role }}">
            {{-- <strong class="form-text">We'll never share your email with anyone else.</strong> --}}
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
@endsection