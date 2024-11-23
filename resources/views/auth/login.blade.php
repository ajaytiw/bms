@extends('frontend.layouts.app')
@section('title', 'Login')
@section('content')


<div class="container bg-light-green py-5">
    <h2 class="text-center">Login here....</h2>
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <form method="POST" action="{{ route('login.submit') }}">
                @csrf   
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                    
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="{{ route('register') }}" class="btn btn-link">New User Register here? Register</a>
                
            </form>
        </div>
    </div>
</div>




@endsection