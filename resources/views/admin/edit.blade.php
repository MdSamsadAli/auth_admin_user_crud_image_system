@extends('layouts.admin.layout')
@section('content')

<div class="text-center">
    <h1 class="mt-4 mb-4"> 
        Update Product Here
    </h1>
</div>
<form action="{{ route('admin.update', $products->id) }}" method="POST" class="w-600" enctype="multipart/form-data">
    @csrf
    <div class="col-8">
        <div class="mb-3">
            <label class="form-label" for="image">Product</label>
            <input type="file" class="form-control" name="file" value="{{ $products->file }}">
            <img src="{{ asset('blog/images/'. $products->image) }}" height="100" width="100">
            {{-- <strong class="form-text">We'll never share your email with anyone else.</strong> --}}
        </div>
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $products->title }}">
            {{-- <strong class="form-text">We'll never share your email with anyone else.</strong> --}}
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" class="form-control" name="price" value="{{ $products->price }}">
            {{-- <strong class="form-text">We'll never share your email with anyone else.</strong> --}}
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" name="description" value="{{ $products->description }}">
            {{-- <strong class="form-text">We'll never share your email with anyone else.</strong> --}}
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
@endsection