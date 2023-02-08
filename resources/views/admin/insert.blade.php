@extends('layouts.admin.layout')
@section('content')

<div class="text-center">
    <h1 class="mt-4 mb-4"> 
        Create Product Here
    </h1>
</div>
<form action="{{ route('admin.store') }}" method="POST" class="w-600" enctype="multipart/form-data">
    @csrf
    <div class="col-8">
        <div class="mb-3">
            <label class="form-label" for="file">Product</label>
            <input type="file" class="form-control" name="file">
            <strong class="text-danger">{{ $errors->first('image') }}</strong>
        </div>
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title">
            <strong class="text-danger">{{ $errors->first('title') }}</strong>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" class="form-control" name="price">
            <strong class="text-danger">{{ $errors->first('price') }}</strong>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" name="description">
            <strong class="text-danger">{{ $errors->first('description') }}</strong>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
@endsection


{{-- $product = request()->except(['_token']);
        $image = $request->file('file');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('blog/images'), $new_name);

        $destination = 'blog/images'.[$product->image];
        if(file_exists($destination)){
            @unlink($destination);
        }

        $product = array(
            'title'        =>   $request->title,
            'price'        =>   $request->price,
            'description'        =>   $request->description,
            'image'            =>   $new_name
        );
        
        
         Product::whereId($id)->update($product);
        return redirect()->route('admin.dashboard');
        
        --}}