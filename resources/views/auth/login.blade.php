@extends('layouts.auth.layout')
@section('content')
    <form action="{{ route('auth.login') }}" method="post">
		@csrf
		<h2>Login</h2>
		<p class="hint-text">Create your account. It's free and only takes a minute.</p>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email">
            <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <span class="text-danger">{{ $errors->first('password') }}</span>
        </div>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Login Now</button>
        </div>
    </form>
	<div class="text-center">Already have an account? <a href="{{ route('auth.register') }}">Register</a></div>
@endsection