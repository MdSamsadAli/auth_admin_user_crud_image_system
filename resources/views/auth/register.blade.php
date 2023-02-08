@extends('layouts.auth.layout')
@section('content')
<form action="{{ route('auth.register') }}" method="post">
    @csrf
    <h2>Register</h2>
    <p class="hint-text">Create your account. It's free and only takes a minute.</p>
    <div class="form-group">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="first_name" placeholder="First Name">
                <span class="text-danger">{{ $errors->first('first_name') }}</span>
            </div>
            <div class="col">
                <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                <span class="text-danger">{{ $errors->first('last_name') }}</span>

            </div>
        </div>        	
    </div>
    <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="text-danger">{{ $errors->first('email') }}</span>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="text-danger">{{ $errors->first('password') }}</span>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
    </div>        
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
    </div>
</form>
<div class="text-center">Already have an account? <a href="{{ route('auth.login') }}">Sign in</a></div>
@endsection